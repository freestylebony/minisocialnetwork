@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in as <b>{{Auth::user()->username}}</b> !
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <h3>My Articles </h3>
          @forelse($articles as $article)
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <span class="pull-right">
                      {{$article->created_at->diffForHumans()}}
                    </span>   
                </div>

                <div class="panel-body">
                    {{$article->content}}
                </div>

                <div class="panel-footer clearfix" style="background: white">
                     @if($article->user_id == Auth::user()->id)
                        <form action="/dashboard/{{$article->id}}" method="POST" class="pull-left">
                           {{ csrf_field()}}
                           {{ method_field('DELETE')}}
                           <button class="btn btn-danger btn-sm">
                              Delete
                           </button>
                        </form>
                     @endif
                     <a class="pull-right" href="" style="text-decoration:none ">Comments</a>
                </div>
            </div>
           @empty
             No article avaialabe
           @endforelse
        </div>

        <div class="col-md-8 col-md-offset-2">
            {{$articles->links()}}
        </div>
    </div>
</div>
@endsection
