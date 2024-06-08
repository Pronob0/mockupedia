<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::get();
        return view('admin.page.index',compact('pages'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $this->storeData($request, new Page());
        return back()->with('success',__('Page added successfully'));
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.page.edit',compact('page'));
    }

    public function update(Request $request, $id)
    {
        $this->storeData($request, Page::findOrFail($id), $id);
        return back()->with('success',__('Page updated successfully'));
    }

    public function storeData($request,$data, $id=null) {

        $validation =[
            'title' => 'required|string|max:255|unique:pages,title,'.$id,
            'details' => 'required|string',
           
        ];
        $validate= Validator::make($request->all(),$validation);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
            
        }
        $data->title = $request->title;
        $data->slug = Str::slug($request->title);
        $data->details = $request->details;
        $data->save();
    }

    public function delete(Request $request)
    {
        Page::findOrFail($request->id)->delete();
        return back()->with('success',__('Page deleted successfully'));
    }
}

