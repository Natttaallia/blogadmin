<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index($slug)
    {

    	return view('pages.inner', [
    		'article' => Article::where('slug', $slug)->first(),
    		'top_first'=>Article::where('top_first', true)->first(),
    		'top_second'=>Article::where('top_second', true)->first(),
    		'top_third'=>Article::where('top_third', true)->first()
    	]);
    }
}
