@extends('layouts.app')


@section('content')
    <div class="container">
      <div class="row">
         @forelse($articles as $article)
              <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                   <div class="panel-heading">
                       <span>By {{ $article->user->name}}</span>
                       <span class="pull-right">
                          {{$article->created_at->diffForHumans()}}
                       </span>
                   </div>
                   <div class="panel-body">
                        {{$article->shortContent}}

                        <a href="/articles/{{ $article->id }}">Read More</a>
                   </div>
                   <div class="panel-footer clearfix" style="background: white">
                     @if($article->user_id == Auth::user()->id)
                        <form action="/articles/{{$article->id}}" method="POST" class="pull-left">
                           {{ csrf_field()}}
                           {{ method_field('DELETE')}}
                           <button class="btn btn-danger btn-sm">
                              Delete
                           </button>
                        </form>
                     @endif
                     <a class="pull-right" href="/articles/{{ $article->id }}" style="text-decoration:none ">Comments <span class="badge">
                        @if(count($article->comments) > 0)
                          {{count($article->comments)}}
                        @endif
                      </span>
                     </a>
                   </div>
               </div>
             </div>
         @empty
           No article avaialabe
         @endforelse
     </div>	
     <div class="col-md-6 col-md-offset-3">
        {{$articles->links()}}
     </div>  	
   </div>
@endsection