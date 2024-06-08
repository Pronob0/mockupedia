<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutInfo;
use App\Models\AdminWord;
use App\Models\Advertisement;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Expertise;
use App\Models\GeneralSetting;
use App\Models\Gig;
use App\Models\GigCategory;
use App\Models\HomeBanner;
use App\Models\Message;
use App\Models\Page;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class FrontendController extends Controller
{

    public function index(Request $request)
    {

        if($request->has('search')){
            $search=$request->search;
            $words=AdminWord::where('word','like','%'.$search.'%')->paginate(10);
            return view('frontend.index',compact('words'));
        }
        else{
            $words = AdminWord::orderBy('alphabet','asc')->where('status',1)->paginate(10);
            return view('frontend.index',compact('words'));

        }

    }

    public function contactmail(Request $request)
    {
        $validation =[
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
            

        ];

        $validate= Validator::make($request->all(),$validation);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true); 
        $gs=GeneralSetting::first();

        try {
 
            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = $gs->mail_host;             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = $gs->mail_user;   //  sender username
            $mail->Password = $gs->mail_pass;       // sender password
            $mail->SMTPSecure =$gs->mail_encryption;                  // encryption - ssl/tls
            $mail->Port = $gs->mail_port;                          // port - 587/465
            $mail->setFrom($request->email, $request->name);
            $mail->addAddress($request->to);
            $mail->addReplyTo($request->email, $request->name);
            $mail->isHTML(true);                // Set email content format to HTML
            $mail->Subject = $request->subject;
            $mail->Body    = $request->message;
 
            // $mail->AltBody = plain text version of email body;
 
            if( !$mail->send() ) {
                $data = 0;
                return response()->json($data);
            }
            
            else {
                $data = 1;
                return response()->json($data);
            }
 
        } catch (Exception $e) {
            //  dd($e);
        }
    
    }
    public function all_blog(){
        $blogs=Blog::orderBy('id','desc')->paginate(12);
        $bcategory=BlogCategory::all();
        $gs= GeneralSetting::first();

        $tags= null;
        $tagz='';
        $name=Blog::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        $tags =   array_unique(explode(',',$tagz));
        return view('frontend.blog',compact('blogs','bcategory','tags','gs'));
    }


    public function blog_details($id){

        $gs= GeneralSetting::first();
        $blog=Blog::findOrFail($id);

        $blogs=Blog::orderBy('id','desc')->take(6)->get();
        $bcategory=BlogCategory::all();
        $tags= null;
        $tagz='';
        $name=Blog::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        $tags =   array_unique(explode(',',$tagz));

        return view('frontend.blog_details',compact('blog','blogs','bcategory','tags','gs'));
    }

    public function blog_search(Request $request){
        $blogs=Blog::where('title','like','%'.$request->search.'%')->get();
        $bcategory=BlogCategory::all();

        $gs= GeneralSetting::first();
        $tags= null;
        $tagz='';
        $name=Blog::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        $tags =   array_unique(explode(',',$tagz));
        return view('frontend.blog',compact('blogs','bcategory','tags','gs'));
    }

    public function blog_category($slug){
        $category=BlogCategory::where('slug',$slug)->first();
        $blogs=Blog::where('category_id',$category->id)->get();
        $bcategory=BlogCategory::all();
        $gs= GeneralSetting::first();
        $tags= null;
        $tagz='';
        $name=Blog::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        $tags =   array_unique(explode(',',$tagz));
        return view('frontend.blog',compact('blogs','bcategory','tags','gs'));
    }

    public function blog_tag($slug){
       
        $bcategory=BlogCategory::all();
        $gs= GeneralSetting::first();
        $tags= null;
        $tagz='';
        $name=Blog::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        $tags =   array_unique(explode(',',$tagz));
        $blogs=Blog::where('tags','like','%'.$slug.'%')->get();
        return view('frontend.blog',compact('blogs','bcategory','tags','gs'));
    }

    public function thumbsup(Request $request, $id){

        

        $word= AdminWord::find($id);
        $word->like=$word->like+1;
        $word->save();
        return response()->json($word);
       
        
    }
    public function ads_index(){

        return view('frontend.ads');

    }
    public function ads_store(Request $request){

        $validation =[
            'name'=>'required|string|max:55',
            'email'=>'required|email',
            'interest'=>'required|string|max:55',
            'budget'=>'required|string|max:55',
            'message'=>'required|string|max:255',
            

        ];
        

        $validate= Validator::make($request->all(),$validation);
        
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $contact= new Message();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->interest=$request->interest;
        $contact->budget=$request->budget;
        $contact->message=$request->message;
        $contact->website=$request->website;
        $contact->save();
        $eml= Contact::first();
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true); 
        $gs=GeneralSetting::first();

        try {
 
            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = $gs->mail_host;             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = $gs->mail_user;   //  sender username
            $mail->Password = $gs->mail_pass;       // sender password
            $mail->SMTPSecure =$gs->mail_encryption;                  // encryption - ssl/tls
            $mail->Port = $gs->mail_port;                          // port - 587/465
            $mail->setFrom($request->email, $request->name);
            $mail->addAddress($eml->email);
            $mail->addReplyTo($request->email, $request->name);
            $mail->isHTML(true);                // Set email content format to HTML
            $mail->Subject = "New Advertise Request";
            $mail->Body    = $request->message;
 
            // $mail->AltBody = plain text version of email body;
 
            if( !$mail->send() ) {
                $data = 0;
                
            }
            
            else {
                $data = 1;
                
            }
 
        } catch (Exception $e) {
            //  dd($e);
        }
        return redirect()->back()->with('success','Message Sent Successfully');
    }

    public function page($slug){
        $page=Page::where('slug',$slug)->first();
        $gs= GeneralSetting::first();
        return view('frontend.page',compact('page','gs'));
    }

    public function adclick(Request $request){


        $ad=Advertisement::find($request->id);
        $ad->click=$ad->click+1;
        $ad->save();
        return response()->json($ad);
    }

    public function search(Request $request){
        $search=$request->search;
       
        
        $words=AdminWord::where('word','like','%'.$search.'%')->paginate(10);
        // response as li a without ul
        $output='';
        if($words){
            foreach($words as $word){
                $output.='<li><a href="'.route('alphabet.word',$word->word).'">'.$word->word.'</a></li>';
            }
        }
        return response()->json($output);

    }

    
}
