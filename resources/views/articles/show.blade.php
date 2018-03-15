@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                   <div class="panel-heading">
                      <span>
                        Article by {{$article->user->name}}
                         @if(Auth::user()->id == $article->user_id)
                          <small>
                              <a style="text-decoration: none" href="/articles/{{ $article->id}}/edit">Edit</a>
                          </small>
                         @endif
                      </span>
                       <span class="pull-right">
                          {{$article->created_at->diffForHumans()}}
                       </span>
                   </div>
                   <div class="panel-body">
                        {{$article->content}} <small><a href="/articles">Back</a></small>
                   </div>
               </div>
             </div> 
        <div class="col-md-6 col-md-offset-3">
            <h4>COMMENTS</h4>
          
          @forelse($article->comments as $comment)
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                   <span class="pull-left"><i>Comment by {{$comment->user->name}}</i></span>
                   <span class="pull-right"><b>{{$comment->created_at->diffForHumans()}}</b></span>
                </div>
                <div class="panel-body">
                   {{$comment->comment}}
                     @if($comment->user->name == Auth::user()->name)
                        <small><a href="">Delete</a></small>
                     @endif
                </div>
            </div>
            @empty
              No comment yet
           @endforelse
        </div>

        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              Post Comment
            </div>
            <div class="panel-body">
              <form method="POST" action="/comments">
                   {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="article_id" value="{{$article->id}}">
              <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" name="comment"></textarea>
              </div>
              <input type="submit" class="btn btn-success pull-right" value="Submit">
              </form>
            </div>
          </div>
         </div>    
     </div>	 	
   </div>
@endsection