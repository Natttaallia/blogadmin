<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryTop;
use App\Models\Article;

class CategoryController extends Controller
{
    public function index(string $slug)
    {
    	$dates = Article::selectRaw('year(created_at) `year`, month(created_at) `month`, monthname(created_at) `monthName`, count(created_at) `count`')
        ->groupBy('year', 'month', 'monthName')
        ->orderBy('year')
        ->orderBy('month')
        ->get();

    	$category = Category::where('slug', $slug)->first();
    	$f_id=CategoryTop::where('category_id', $category->id)->first()->first_id;
    	$s_id=CategoryTop::where('category_id', $category->id)->first()->second_id;
    	$t_id=CategoryTop::where('category_id', $category->id)->first()->third_id;
    	return view('pages.welcome', [
    		'categories' => Category::all(),
            'dates' => $dates,
    		
    		'articles' => $category->articles()->simplePaginate(config('custom.paginate_quote')),
    		'top_first'=> Article::where('id', $f_id)->first(),
    		'top_second'=> Article::where('id', $s_id)->first(),
    		'top_third'=> Article::where('id', $t_id)->first(),
    	]);
    }
}
