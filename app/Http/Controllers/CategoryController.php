<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(string $slug)
    {
    	$category = Category::where('slug', $slug)->first();
    	return view('pages.welcome', [
    		'categories' => Category::all(),
    		'articles' => $category->articles()->simplePaginate(config('custom.paginate_quote'))
    	]);
    }
}
