<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AdminWord;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class AlphabetController extends Controller
{
    public function alphabet($slug)
    {
        // get all data alphabetic order 

        $words = AdminWord::where('status',1)->paginate(90);

        $filterword= [];

        foreach($words as $data){

            if(strtolower(mb_substr($data->word, 0, 1)) == strtolower($slug)){
                
                array_push($filterword,$data->word);
            }
            
        }
   
        return view('frontend.alphabet.filterwords',compact('filterword','slug','words'));
    }


    public function alphabet_word($slug){

        $value = AdminWord::where('word',$slug)->first();

        return view('frontend.alphabet.word',compact('value'));

    }

    public function user_word_add(){
            
            return view('frontend.alphabet.user_word_add');
    }

    public function user_word_store(Request $request){
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
        $adminword->username= $request->username;
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
        $adminword->status =0;
        $adminword->save();
        return redirect()->back()->with('success','Word Added Successfully');
    }

}
