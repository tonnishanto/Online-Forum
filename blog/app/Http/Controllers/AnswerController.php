<?php

namespace Forum\Http\Controllers;

use Forum\answer;

use Illuminate\Http\Request;

use Forum\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function create(Request $request){
        $validation=validator::make($request->all(),array(
            'user_id'=>'required',
            'thread_id'    =>'required',
            'content'   =>'required|min:5',
        ));

        if($validation->fails()){
            return Redirect::back()->withErrors($validation);
        }

        $answer = new answer;


        $answer->user_id=$request->Input('user_id');
        $answer->thread_id=$request->Input('thread_id');
        $answer->content=$request->Input('content');

        $answer->save();

        return Redirect::back();

    }
}
