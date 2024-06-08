<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){

        $categories = BlogCategory::orderBy('id','desc')->get();
        return view('admin.blog-category.index',compact('categories'));
    }

    public function store(Request $request)
    {
        $validation =[
                
                'name' => 'required',
                'slug' => 'required|unique:blog_categories,slug',
               
            ];
        $validate= Validator::make($request->all(),$validation);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
            
        }

        $blog_category = new BlogCategory();
        $input = $request->all();
        $blog_category->fill($input)->save();
        
        return redirect()->back()->with('success','Blog Category Added Successfully');
    }

    public function update(Request $request,$id)
    {
        $validation =[
                
                'name' => 'required',
                'slug' => 'required|unique:blog_categories,slug,'.$id,
               
            ];
        $validate= Validator::make($request->all(),$validation);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
            
        }

        $blog_category = BlogCategory::find($id);
        $input = $request->all();
        $blog_category->fill($input)->save();
        
        return redirect()->back()->with('success','Blog Category Updated Successfully');
    }

    public function delete($id)
    {
        $blog_category = BlogCategory::find($id);
        $blog_category->delete();
        return redirect()->back()->with('success','Blog Category Deleted Successfully');
    }
}
