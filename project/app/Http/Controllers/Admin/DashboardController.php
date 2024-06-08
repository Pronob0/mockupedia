<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutInfo;
use App\Models\Admin;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){

        
        return view('admin.dashboard');
    }
    public function changepass()
    {
        return view('admin.changepass');
    }
    public function changepassupdate(Request $request){
        $user = Auth::user();
        $admin=Admin::findOrFail($user->id);
        $input = $request->all();
       
        if ($request->cpass){
            if (Hash::check($request->cpass, $user->password)){
                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{

                    return redirect()->back()->withErrors( __('Confirm password does not match.'));
                    
                }
            }else{
                return redirect()->back()->withErrors(__('Current password does not match.'));
            }

           
        }
        $admin->fill($input)->save();
        Auth::logout();
        return redirect()->back()->with('success', __('Password changed successfully.'));

    }
}
