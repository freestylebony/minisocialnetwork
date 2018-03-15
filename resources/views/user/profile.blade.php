@extends('layouts.app')


@section('content')
   <div class="container">
   	  <div class="row">
          <div class="col-md-6 col-md-offset-3">
              @if(session('status'))
                  <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('status') }}
                  </div>
              @endif
          </div>

   	  	 <div class="col-md-6 col-md-offset-3">
   	  	 	<div class="panel panel-default">
   	  	 		<div class="panel-body text-center">
   	  	 			<h1>{{$user->name}}</h1>
   	  	 			<h5>{{$user->email}}</h5>
   	  	 			<h5>{{$user->dob->format('l j F Y')}} ({{$user->dob->age}} years old)</h5>
               @if(!empty($user->avatar))
                  <div><img src="/images/{{ $user->avatar }}" width="200" height="200" /></div>
               @endif
   	  	 			<small><a href="/profile/{{$user->username}}/edit"> Edit Profile</a></small>
   	  	 		</div>
   	  	 	</div>
   	  	 </div>
   	  </div>
   </div>


@endsection