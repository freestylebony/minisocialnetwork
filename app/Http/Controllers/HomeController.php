<?php

namespace App\Http\Controllers;
use App\Article;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $id = Auth::user()->id;
        $articles = Article::whereUser_id($id)->paginate(5);
        return view('home',compact('articles'));
    }

    public function deletemyarticle($id)
    {
         $article = Article::findOrFail($id);
         $article->delete();
         return redirect('/dashboard');

    }

   
}
