<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
      return view('admin.login');
    }

    public function adminLogin(Request $request){
        // dd($request->all());
        $input = $request->all();
        $rules = [
            'email'   => 'required|email',
            'password' => 'required'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

           
                return response()->json(route('admin.dashboard'));
           
        }

        $msg = array(
            'type' => 'warn',
            'message' => "Credentials Doesn\'t Match !"
        );
        return response()->json(array('errors' => $msg));
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('front.index');
    }


}
