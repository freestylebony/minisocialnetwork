@extends('layouts.app')


@section('content')
    <div class="container">
   	  <div class="row">
   	  	 <div class="col-md-6 col-md-offset-3">
   	  	 	<div class="panel panel-default">
   	  	 		<div class="panel-heading">
   	  	 			Edit Article
   	  	 		</div>
   	  	 		<div class="panel-body">
   	  	 		  <form method="POST" action="/articles/{{ $article->id }}">
                     {{ method_field('PUT') }}
   	  	 		  	   {{ csrf_field() }}
   	  	 		  	<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
   	  	 			<div class="form-group">
   	  	 				<label for="content">Content</label>
   	  	 				<textarea class="form-control" name="content"> {{$article->content}} </textarea>
   	  	 			</div>

   	  	 			<div class="form-group">
   	  	 				<label for="post_on">Post on</label>
   	  	 				<input type="datetime-local" class="form-control" name="post_on" value="{{ $article->post_on->format('Y-m-d\TH:i:s') }}">
   	  	 			</div>

   	  	 			<input type="submit" class="btn btn-success pull-right" value="Submit">
   	  	 		  </form>
   	  	 		</div>
   	  	 	</div>
   	  	 </div>
   	  </div>
   </div>
@endsection