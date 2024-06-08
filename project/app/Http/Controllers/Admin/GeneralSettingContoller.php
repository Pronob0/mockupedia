<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeneralSettingContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function email(){
        $gs= GeneralSetting::first();
        return view('admin.generalsetting.mail',compact('gs'));
    }

    public function general(){
        $gs= GeneralSetting::first();
        return view('admin.generalsetting.general',compact('gs'));
    }

    public function seotools(){
        $gs= GeneralSetting::first();
        return view('admin.generalsetting.seotools',compact('gs'));
    }

    public function update(Request $request){

        $validation =[
                
           
            'fav' => 'mimes:jpg,png,jpeg',
            'gif' => 'mimes:jpg,png,jpeg,gif',

           
        ];
        $validate= Validator::make($request->all(),$validation);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
            
        }
        $gs= GeneralSetting::first();
        $input = $request->all();
       
        if( $request->hasFile('fav') ){
           
            $image = $request->file('fav');
            $image_name = time().'-'.$image->getClientOriginalExtension();
            $image->move('assets/images/',$image_name);
            if($gs->fav != null)
                {
                    if (file_exists('/assets/images/'.$gs->fav)) {
                        unlink('/assets/images/blog/'.$gs->fav);
                    }
                }
            $input['fav'] = $image_name;
            
        }
        if( $request->hasFile('gif') ){
           
            $image = $request->file('gif');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/images/',$image_name);
            if($gs->gif != null)
                {
                    if (file_exists('/assets/images/'.$gs->gif)) {
                        unlink('/assets/images/'.$gs->gif);
                    }
                }
           
            $input['gif']= $image_name;
            
        }


        if (isset($request->meta_tags))
        {
            $tags = implode(',',$request->meta_tags);

           
            $new=[];
            foreach (json_decode($tags) as $tag) {
                $new[] = $tag->value;
            }
            $new= implode(',',$new);

            $input['meta_tags'] = $new;
            
        }
        else{
            $tags = null;
        }
        
       
        
        $gs->fill($input)->save();
        return redirect()->back()->with('success','Data Updated Successfully');
    }

    public function paypal(){
        $gs= GeneralSetting::first();
        return view('admin.generalsetting.paypal',compact('gs'));
    }
}
