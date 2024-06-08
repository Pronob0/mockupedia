<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
    }

    public function showLoginForm (){
        return view('owner.login');

    }

    public function ownerLogin(Request $request){
        // Validate the form data
        $validation= [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validate= Validator::make($request->all(),$validation);
        
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
            
        }
        
        // Attempt to log the user in
        if (auth()->guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('user.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }
    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect()->route('login');
    }
}
