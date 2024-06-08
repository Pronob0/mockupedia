<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegisterForm(){
        return view('owner.register');
    }

    public function ownerRegister(Request $request){

        $validation =[
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            
        ];

        $validate= Validator::make($request->all(),$validation);
        
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
            
        }

        $owner = new User();
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->password = bcrypt($request->password);
        $owner->phone = $request->phone;
        $owner->save();

        return redirect()->route('loginform')->with('success','Owner Registered Successfully');
    }
}
