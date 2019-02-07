<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index($slug)
    {
    	return view('pages.inner', [
    		'article' => Article::where('slug', $slug)->first()
    	]);
    }
}
