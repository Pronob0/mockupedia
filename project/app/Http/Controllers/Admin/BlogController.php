<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Purifier;

class BlogController extends Controller


{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $blogs= Blog::orderBy('id','desc')->get();
        return view('admin.blog.index',compact('blogs'));
    }

    public function create()
    {
        $categories= BlogCategory::orderBy('id','desc')->get();
        return view('admin.blog.create',compact('categories'));
    }

    public function store(Request $request)
    {

        $validation =[
                
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'status' => 'required',
            'category_id' => 'required',
            'source' => 'required',
            'tags' => 'required',
           
        ];
        $validate= Validator::make($request->all(),$validation);
        $input = $request->all();
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
            
        }
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/images/blog',$image_name);
            $input['image'] = $image_name;
        }
        $blog=new Blog();
      

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
        if (isset($request->meta_keyword))
        {
            $meta_tags = implode(',',$request->meta_keyword);
        }
        else{
            $meta_tags = null;
        }
        $input['tags'] = $new;
        $input['meta_keyword'] = $meta_tags;
        $input['description']= Purifier::clean($request->description);
        $blog->fill($input)->save();
        return redirect()->route('admin.blog')->with('success','Blog Created Successfully');
    }

    public function edit($id)
    {
        $blog= Blog::find($id);
        $categories= BlogCategory::orderBy('id','desc')->get();
        return view('admin.blog.edit',compact('blog','categories'));
    }

    
    public function update(Request $request, $id)
    {
        
        $validation =[
                
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug,'.$id,
            'description' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'source' => 'required',
            'tags' => 'required',
            'image' => 'mimes:jpg,jpeg,png',

           
        ];
        $validate= Validator::make($request->all(),$validation);
        $input = $request->all();
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
            
        }
        $blog= Blog::find($id);
        if( $request->hasFile('image') ){
         
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
        
            $image->move('assets/images/blog',$image_name);
            
                    if (file_exists('/assets/images/blog/'.$blog->image)) {
                        unlink('/assets/images/blog/'.$blog->image);
                    }
              
                $input['image'] = $image_name;
        }
       
        
       

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
        if (isset($request->meta_keyword))
        {
            $meta_tags = implode(',',$request->meta_keyword);
        }
        else{
            $meta_tags = null;
        }
        $input['tags'] = $new;
        $input['meta_keyword'] = $meta_tags;
        $input['description']= Purifier::clean($request->description);
        $blog->fill($input)->save();
        return redirect()->route('admin.blog')->with('success','Blog Updated Successfully');
    }

    public function delete($id)
    {
        $blog= Blog::find($id);
        if($blog->image != null)
        {
            
            if (file_exists('/assets/images/blog/'.$blog->image)) {
                unlink('/assets/images/blog/'.$blog->image);
            }
        }
        $blog->delete();
        return redirect()->back()->with('success','Blog Deleted Successfully');
    }
}
