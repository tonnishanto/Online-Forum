<?php



Route::group(['middleware' => ['web']], function () {
    Route::get('/', [
        'uses'=>'HomeController@index',
        'as'=>'home'
    ]);

    Route::get('about',[
        'as'=>'about_us',
        'uses'=>'HomeController@about']);

    //category route

    Route::get('category/create',[
        'as'=>'category.create',
        'uses'=>'CategoryController@create']);

    Route::get('category',[
        'as'=>'category.index',
        'uses'=>'CategoryController@index']);

    Route::get('category/{category}',[
        'as'=>'category.show',
        'uses'=>'CategoryController@show']);

    Route::post('category/create','CategoryController@store');


    Route::get('category/edit/{id}',[
        'as'=>'category.edit',
        'uses'=>'CategoryController@edit']);


    Route::post('category/update/{id}',[
        'as'=>'category.update',
        'uses'=>'CategoryController@update']);


   Route::get('category/delete/{id}',[
       'as'=>'category.delete',
       'uses'=>'CategoryController@delete']);

    //thread controller work

    Route::get('thread/create',[
        'as'=>'thread.create',
        'uses'=>'ThreadController@create']);


    Route::post('thread/store',[
        'as'=>'thread.store',
        'uses'=>'ThreadController@store']);


    Route::get('threads',[
        'as'=>'thread.index',
        'uses'=>'ThreadController@index']);


    Route::get('thread/show/{id}',[
        'as'=>'thread.show',
        'uses'=>'ThreadController@show']);

    Route::get('thread/edit/{id}',[
        'as'=>'thread.edit',
        'uses'=>'ThreadController@edit']);


    Route::post('thread/update/{id}',[
        'as'=>'thread.update',
        'uses'=>'ThreadController@update']);

    Route::get('thread/delete/{id}',[
        'as'=>'thread.delete',
        'uses'=>'ThreadController@delete']);

    Route::post('answer/new',[
        'as'=>'answer.new',
        'uses'=>'AnswerController@create']);


});





Route::group(['middleware' => 'web'], function () {
    Route::auth();


});

