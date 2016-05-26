@extends('layouts.app')


@section('content')


  <header>
        <h1 class="title">FORUM | LARAVEL FORUM</h1>
  </header>

    <section class="top-banner">
        <div class="row-fluid">
            <div class="container">
                <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3" id="tracker">
                    <form action="#" method="post">

                        <input type="text" name="search" placeholder="Search" class="form-control">

                    </form>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6" id="track">
                    <h2 class="forum">FORUM</h2>
                </div>
            </div>
        </div>
    </section>

  <section id="main">
      <div class="row-fluid">
          <div class="container">
              <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
                    <legend class="text-center" id="text">Category</legend>
                  @if(Auth::check())
                      @if(Auth::user())
                  <p class="text-center"><a class="btn btn-success" href="{{route('category.create') }}">Create Category</a></p>
                          @endif
                  @endif
                  <ul class="list-group">
                      @foreach($cat as $value)
                      <a class="list-group-item active" href="{!! route('category.show',[$value->name]) !!}" style="border: 1px solid black">
                          {{$value->name}} <span class="badge" data-toggle="tooltip" data-placement="right" title="{{$value->description}}"><i class="fa fa-info"></i></span>
                      </a>
                      @endforeach
                          <a href="{{route('category.index')}}" class="btn btn-danger btn-block">SEE Category</a>
                  </ul>

              </div>

              <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6" id="display">


                   <ul class="list-group">

                       @if(count($thread)>0)

                           @foreach($thread as $t)

                               <a class="list-group-item" href="{!! route('thread.show',[$t->id]) !!}">
                                   <h3 class="list-group-item-heading btn-block">{{ $t->question}}<span class="badge">OPEN</span></h3>

                                   <hr>
                                   <p class="list-group-item-text">
                                      <pre> {{$t->explanation}}</pre>

                                   </pre>

                                   <h5><strong>Published By:</strong>{!! $t->user->name !!} | <small>Responses: <span class="badge">{!! count($t->comments) !!}</span></small> | <small>Publishes Date:{!!$t->created_at->diffForHumans()!!}</small></h5>


                               </a>


                           @endforeach
                           @else
                           <h1 class="text-center">
                                <i class="fa fa-exclamation-triangle text-warning"></i><br>
                               <small>ERROR</small>
                           </h1>

                           @endif
                       {{-- for each--}}

                   </ul>
                  {!! $thread->links() !!}
              </div>

          </div>
      </div>
  </section>




@endsection
