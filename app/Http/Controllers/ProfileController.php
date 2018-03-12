<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function profile($username)
    { 

      $user = User::whereUsername($username)->first();
       
      return view('user.profile', compact('user'));

    }


    public function editprofile($username)
    {
      $user = User::whereUsername($username)->first();
       
      return view('user.editprofile', compact('user'));

    }


    public function storeProfile($username, Request $request)
    {
    	$user = User::whereUsername($username)->first();
         $dob = $request->dob;
         $name = $request->name;

    	$avatar = $request->avatar;
    	if($avatar)
    	{
    		$imageName =$avatar->getClientOriginalName();
    		$avatar->move('images', $imageName);
            
    	}

    	$user->name = $name;
    	$user->dob = $dob;
    	$user->avatar = $imageName;

    	$user->save();
	    	return redirect('/profile/'.$username.'');
    }
}
