<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index(){
        return view('owner.dashboard');
    }

    public function category(){
        $categories=Category::orderBy('id','desc')->get();
        return view('owner.category',compact('categories'));
    }

    public function level(){
        $levels=Level::orderBy('id','desc')->get();
        return view('owner.level',compact('levels'));
    }

    public function changepass()
    {
        return view('owner.changepass');
    }
    public function changepassupdate(Request $request){
        $user = Auth::user();
        $admin=User::findOrFail($user->id);
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
        return redirect()->route('front.index')->with('success', __('Password changed successfully.'));

    }

    public function profile()
    {
        $user = Auth::user();
        return view('owner.profile',compact('user'));
    }

    public function profileupdate(Request $request){
        $user = Auth::user();
        $validation =[
            'name' => 'required|unique:users,name,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
           
            
        ];

        $validate= Validator::make($request->all(),$validation);
        
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
            
        }
        $admin=User::findOrFail($user->id);
        $input = $request->all();

        if( $request->hasFile('photo') ){
         
            $image = $request->file('photo');
            $image_name = time().'.'.$image->getClientOriginalExtension();
        
            $image->move('assets/images/',$image_name);
            
                    if (file_exists('/assets/images/'.$admin->photo)) {
                        unlink('/assets/images/'.$admin->photo);
                    }
              
                $input['photo'] = $image_name;
        }
        $admin->fill($input)->save();
        return redirect()->route('profile')->with('success', __('Profile updated successfully.'));

    }


}
