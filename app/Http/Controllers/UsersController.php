<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
    	$users = User::paginate(10);
    	//return $users;

    	return view('user', compact('users'));
    }


    public function create()
    {
    	return view('create');
    }

    public function store(Request $request)
    {
    	User::create($request->all());
    	return 'success';
    }
}
