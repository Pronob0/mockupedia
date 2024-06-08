<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminWord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminWordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $adminwords = AdminWord::orderBy('id','DESC')->where('status',1)->get();
        return view('admin.words.index',compact('adminwords'));
        
    }
    public function pending(){
        $adminwords = AdminWord::orderBy('id','DESC')->where('status',0)->get();
        return view('admin.words.pending',compact('adminwords'));
        
    }

    public function store(Request $request){
        $validation =[
            'word' => 'required|string|max:55',
            'definition' => 'required|string|max:255',
            'example' => 'required|string|max:255',
            'username' => 'required|string|max:55',
        ];

        $validate= Validator::make($request->all(),$validation);
        
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
            
        }

        $adminword = new AdminWord();
        $adminword->word = $request->word;
        $adminword->alphabet = substr($request->word,0,1);
        $adminword->definition = $request->definition;
        $adminword->example = $request->example;
        $adminword->username= auth()->user()->name;
        if (isset($request->tags))
        {
            $tags = implode(',',$request->tags);

           
            $new=[];
            foreach (json_decode($tags) as $tag) {
                $new[] = $tag->value;
            }
            $new= implode(',',$new);
            
        }
        else{
            $tags = null;
        }
        $adminword->tags = $new;
        $adminword->status =1;
        $adminword->save();
        return redirect()->back()->with('success','Word Added Successfully');
    }

    public function update(Request $request,$id){
        $validation =[
            'word' => 'required',
            'definition' => 'required',
        ];

        $validate= Validator::make($request->all(),$validation);
        
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
            
        }

        $adminword = AdminWord::findOrFail($id);
        $adminword->word = $request->word;
        $adminword->alphabet = substr($request->word,0,1);
        $adminword->definition = $request->definition;
        $adminword->example = $request->example;
        $adminword->username= auth()->user()->name;
        if (isset($request->tags))
        {
            $tags = implode(',',$request->tags);

           
            $new=[];
            foreach (json_decode($tags) as $tag) {
                $new[] = $tag->value;
            }
            $new= implode(',',$new);
            
        }
        else{
            $tags = null;
        }
        $adminword->tags = $new;
        $adminword->status =1;
        $adminword->update();
        return redirect()->back()->with('success','Word Updated Successfully');
    }


    public function status($id1,$id2)
    {
        $data = AdminWord::findOrFail($id1);
        $data->status = $id2;
        $data->update();

        $msg = __('Data Updated Successfully.');
        return redirect()->back()->with('success', $msg);
    }
    
    public function delete($id)
    {
        $data = AdminWord::findOrFail($id);
        $data->delete();
        $msg = __('Data Deleted Successfully.');
        return redirect()->back()->with('success', $msg);
    }
}
