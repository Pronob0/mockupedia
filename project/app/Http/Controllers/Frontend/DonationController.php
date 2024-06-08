<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function all_donation(){
        $data = Donation::first();
        return view('frontend.donation.all_donation',compact('data'));
    }

    public function paycancle(){
        Toastr::error('Payment Cancelled');
        return redirect()->back();
    }

    public function payreturn(){
        Toastr::success('Payment Successfull');
        return redirect()->back();
    }
}
