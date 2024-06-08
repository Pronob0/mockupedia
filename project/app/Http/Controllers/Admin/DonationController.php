<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\UserDonation;
use Illuminate\Http\Request;

class DonationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $data= Donation::first();
        return view('admin.donation.index',compact('data'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'slogan'=>'required',
            'description'=>'required',
            'image'=>'image|mimes:jpg,jpeg,png,gif,svg',
            
        ]);
        $donation = Donation::first();
        if( $request->hasFile('image') ){
         
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
        
            $image->move('assets/images/donation',$image_name);
            
                    if (file_exists('/assets/images/donation/'.$donation->image)) {
                        unlink('/assets/images/donation/'.$donation->image);
                    }
              
                $donation->image = $image_name;
        }
        $donation->title = $request->title;
        $donation->slogan = $request->slogan;
        $donation->description = $request->description;
        $donation->end_date = $request->end_date;
        
        $donation->save();
        return redirect()->back()->with('success','Donation Campaign Updated Successfully');
    }

    public function alluser()
    {
        $datas = UserDonation::orderBy('id','DESC')->get();
        return view('admin.donation.alluser',compact('datas'));
    }

    public function delete($id)
    {
        $data = UserDonation::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success','Donation Deleted Successfully');
    }

}
