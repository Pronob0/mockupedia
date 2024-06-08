<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\GeneralSetting;
use App\Models\UserDonation;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PayPal\{
    Api\Item,
    Api\Payer,
    Api\Amount,
    Api\Payment,
    Api\ItemList,
    Rest\ApiContext,
    Api\Transaction,
    Api\RedirectUrls,
    Api\PaymentExecution,
    Auth\OAuthTokenCredential
};
use PHPMailer\PHPMailer\PHPMailer;

class PaypalController extends Controller
{
    private $_api_context;
    public function __construct()
    {
        

        $data= GeneralSetting::first();

        $paypal_conf = \Config::get('paypal');
        $paypal_conf['client_id'] = $data['client_id'];
        $paypal_conf['secret'] = $data['client_secret'];
        $paypal_conf['settings']['mode'] = $data['sandbox_check'] == 1 ? 'sandbox' : 'live';
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }


    public function store(Request $request){

        $camp = Donation::findOrFail($request->campaign_id);
        $item_amount = $request->amount;
        
        $campaign['campaign_id'] = $request->campaign_id;
        $campaign['title'] = $camp->title;
        $campaign['amount'] = $item_amount;
        $cancel_url = route('payment.cancle');
        $notify_url = route('paypal.notify');

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName($camp->title) /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($item_amount); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($item_amount);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($camp->title.' Via Paypal');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl($notify_url) /** Specify return URL **/
            ->setCancelUrl($cancel_url);
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            Toastr::error($ex->getMessage(),'Error');
            return redirect()->back();
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                    break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_data',$campaign);
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        Toastr::error('Unknown error occurred', 'Error');
        return redirect()->back();
     }

     public function notify(Request $request){

        

        $paypal_data = Session::get('paypal_data');
        $success_url = route('payment.return');
        $cancel_url = route('payment.cancle');
        $input = $request->all();
        

        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        if (empty( $input['PayerID']) || empty( $input['token'])) {
            return redirect($cancel_url);
        }
       
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($input['PayerID']);
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->state == 'approved') {

            $resp = json_decode($payment, true);
            $order = new UserDonation();
            $order->campaign_id = $paypal_data['campaign_id'];
            $order->title = $paypal_data['title'];
            $order->amount = $paypal_data['amount'];
            $order->txnid = $resp['transactions'][0]['related_resources'][0]['sale']['id'];
            $order->status = 1;
            $order->save();

           

            $campaign = Donation::findOrFail($paypal_data['campaign_id']);
            $campaign->amount = $campaign->amount + $paypal_data['amount'];
            $campaign->total_donate= $campaign->total_donate ++;


            require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true); 
            $gs=GeneralSetting::first();
            $contact=Contact::first(); 

            try {
 
                // Email server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = $gs->mail_host;             //  smtp host
                $mail->SMTPAuth = true;
                $mail->Username = $gs->mail_user;   //  sender username
                $mail->Password = $gs->mail_pass;       // sender password
                $mail->SMTPSecure =$gs->mail_encryption;                
                $mail->Port = $gs->mail_port;                          
                $mail->setFrom($gs->from_email, $gs->from_name);
                $mail->addAddress($contact->email);
                $mail->addReplyTo($gs->from_email, $gs->from_name);
                $mail->isHTML(true);                // Set email content format to HTML
                $mail->Subject = 'New Donation From a Donor';
                $mail->Body    = 'Hello Admin, <br/> <br/> A new donation has been made by a donor.';
     
                // $mail->AltBody = plain text version of email body;
                if( !$mail->send() ) {
                    Toastr::error('Something went wrong. Please try again later.','Failed');

                    
                }
                
                else {
                   
                    
                }
     
            } catch (Exception $e) {
                //   dd($e);
            }
            
          

            Toastr::success('Donation has been made successfully. Thank you.','Success');
            Session::forget('paypal_data'); 
            Session::forget('paypal_payment_id');
            return redirect()->back();
                    
                    }
                    else {
                        return redirect($cancel_url);
                    }

    }
}
