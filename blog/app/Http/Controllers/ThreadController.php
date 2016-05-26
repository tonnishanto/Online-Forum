<?php

namespace Forum\Http\Controllers;

use Auth;
use Forum\category;

use Forum\thread;

use Validator;
use Illuminate\Http\Request;

use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;
use Redirect;


class ThreadController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index(){

        $thread=thread::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(5);

        return view('thread.index')->with('threads',$thread);
    }

    public function show($id){

        $thread=thread::find($id);

        return view('thread.show')->with('threads',$thread);

    }

    public function create(){

        $category=category::all();

        return view('thread.create')->with('cates',$category);
    }

    public function store(Request $request){
        $validation=validator::make($request->all(),array(
            'category_id'=>'required|integer',
            'user_id'    =>'required|integer',
            'question'   =>'required',
            'explanation'=>'required|min:10'
        ));
        if($validation->fails()){
            return Redirect::route('thread.create')->withErrors($validation);
        }

        $thread=new thread();
        $thread->category_id=$request->Input('category_id');
        $thread->user_id=$request->Input('user_id');
        $thread->question=$request->Input('question');
        $thread->explanation=$request->Input('explanation');
        $thread->save();

        return Redirect::route('home');
    }

    public function edit($id){


        $thread=thread::find($id);
        $cats=category::all();

        return view('thread.edit',['cats'=>$cats,'thread'=>$thread]);

    }

    public function update(Request $request,$id){



        $validation=validator::make($request->all(),array(
            'category_id'=>'required|integer',
            'user_id'    =>'required|integer',
            'question'   =>'required',
            'explanation'=>'required|min:10'
        ));
        if($validation->fails()){
            return Redirect::route('thread.edit')->withErrors($validation);
        }

        $thread =thread::find($id);


        $thread->category_id=$request->Input('category_id');
        $thread->user_id=$request->Input('user_id');
        $thread->question=$request->Input('question');
        $thread->explanation=$request->Input('explanation');
        $thread->save();

        return Redirect::route('home');

    }

    public function delete($id){

        $thread=thread::find($id);
        $thread->delete();

        return Redirect::route('thread.index');
    }
}
