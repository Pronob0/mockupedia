<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisement = Advertisement::all();
        return view('admin.advertisement.index',compact('advertisement'));
    }

    public function create()
    {
        return view('admin.advertisement.create');
    }

    public function store(Request $request)
    {
        $validation= [
            'company' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'type' => 'required',
            'link' => 'required',
            'position' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'duration' => 'required',
        ];

        $validate= Validator::make($request->all(),$validation);
        $input = $request->all();
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
            
        }

        $advertisement = new Advertisement();
        $advertisement->company = $request->company;
        $advertisement->type = $request->type;
        $advertisement->link = $request->link;
        $advertisement->position = $request->position;
        $advertisement->start_date = $request->start_date;
        $advertisement->end_date = $request->end_date;
        $advertisement->duration = $request->duration;
        $advertisement->status = 1;

        if( $request->hasFile('banner') ){
            $image = $request->file('banner');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/images/ads',$image_name);
            $advertisement->banner = $image_name;
        }
        $advertisement->save();
        return redirect()->route('admin.advertisement.all')->with('success','Advertisement Created Successfully');
    }
    
    public function update(Request $request, $id)
    {
        

        $advertisement = Advertisement::findOrFail($id);
        $advertisement->company = $request->company;
        $advertisement->type = $request->type;
        $advertisement->link = $request->link;
        $advertisement->position = $request->position;
        $advertisement->start_date = $request->start_date;
        $advertisement->end_date = $request->end_date;
        $advertisement->duration = $request->duration;
        $advertisement->status = 1;

        if( $request->hasFile('banner') ){
            $image = $request->file('banner');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/images/ads',$image_name);
            $advertisement->banner = $image_name;
        }
        $advertisement->update();
        return redirect()->route('admin.advertisement.all')->with('success','Advertisement Edited Successfully');
    }
    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('admin.advertisement.edit',compact('advertisement'));
    }
    
    public function delete($id){
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete();
        return redirect()->route('admin.advertisement.all')->with('success','Advertisement deleted Successfully');
        
    }
}
