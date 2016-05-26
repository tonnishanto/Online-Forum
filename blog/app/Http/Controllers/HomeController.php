<?php

namespace Forum\Http\Controllers;

use Forum\category;
use Forum\Http\Requests;
use Forum\thread;
use Illuminate\Http\Request;



class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','about']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=thread::orderBy('created_at','desc')->paginate(5);
        $cate=category::all();
        return view('welcome',['thread'=>$data,'cat'=>$cate]);
    }

    public function about(){

        return view('about_us');
    }
}
