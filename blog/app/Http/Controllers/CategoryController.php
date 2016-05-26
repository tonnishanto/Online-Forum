<?php

namespace Forum\Http\Controllers;

use Forum\category;
use Illuminate\Http\Request;

use Forum\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function create()
    {

        return view('category.create');

    }

    public function store(Request $request)
    {

        $validator = validator::make($request->all(), array(

            'name' => 'required',
            'description' => 'required|min:20'

        ));
        if ($validator->fails()) {
            return Redirect::route('category.create')->withErrors($validator);
        }
        category::create([

            'name' => $request->input('name'),
            'description' => $request->input('description'),

        ]);
        return Redirect::route('home');

    }

    public function index()
    {

        $category = category::all();

        return view('category.index')->with('categories', $category);


    }

    public function show()
    {


    }

    public function showCategory()
    {

    }

    public function edit($id)
    {

        $cate = category::find($id);
        return view('category/edit')->with('cat', $cate);

    }

    public function update(Request $request, $id)
    {

        $cate = category::find($id);

        $validator = validator::make($request->all(), array(

            'name' => 'required',
            'description' => 'required|min:20'

        ));
        if ($validator->fails()) {
            return Redirect::route('category.update')->withErrors($validator);
        }


        $cate->name = $request->input('name');
        $cate->description = $request->input('description');
        $cate->save();


        return Redirect::route('home');
    }


    public function delete($id)
    {

        $delete = category::find($id);
        $delete->delete();
        return Redirect::route('home');
    }

}



