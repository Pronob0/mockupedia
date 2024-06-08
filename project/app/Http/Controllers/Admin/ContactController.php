<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $contact=Contact::first();
        return view('admin.contact.index',compact('contact'));
    }

    public function update(Request $request,$id)
    {
        $validation=[
            'location'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'website'=>'required',
        ];
        $validate= Validator::make($request->all(),$validation);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $contact=Contact::findOrFail($id);
        $input = $request->all();
        $contact->fill($input)->save();
        return redirect()->back()->with('success','Contact Updated Successfully');
    }
    
}
