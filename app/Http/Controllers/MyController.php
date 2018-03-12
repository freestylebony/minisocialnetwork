<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function myindex()
    {  
        $articles = Article::paginate(10);
    	return view('articles.index', compact('articles'));
    }
}
