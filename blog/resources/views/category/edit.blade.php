@extends('layouts.app')@section('content')    <section class="logbox" id="main">        <div class="row-fluid">            <div class="container">                <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-lg-offset-3">                    <form action="{!! url('category/update',[$cat->id]) !!}" method="POST">                        {!! csrf_field() !!}                        <div class="form-group">                            <label for="exampleInputEmail1">Category Name</label>                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{!! $cat->name !!}">                        </div>                        @if($errors->has('name'))                            <span style="color:red">{!!$errors->first('name')!!}</span>                        @endif                        <div class="form-group">                            <label for="exampleInputEmail1">Description</label>                            <input type="textarea" name="description" class="form-control" id="exampleInputEmail1" value="{!! $cat->description !!}">                        </div>                        @if($errors->has('description'))                            <span style="color:red">{!!$errors->first('description')!!}</span>                        @endif                        <button type="submit" class="btn btn-default">Update</button>                    </form>                </div>            </div>        </div>    </section>@endsection