<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    {

/*
    $request->year
    $request->input('year')
*/

    	$dates = Article::selectRaw('year(created_at) `year`, month(created_at) `month`, monthname(created_at) `monthName`, count(created_at) `count`')
        ->groupBy('year', 'month', 'monthName')
        ->orderBy('year')
        ->orderBy('month')
        ->get();

    	// dd($dates->toArray());
    	return view('pages.welcome', [
    		'articles' => Article::getByDate($request->year, $request->month)->simplePaginate(config('custom.paginate_quote')),
    		'categories' => Category::all(),
            'dates' => $dates,
            'top_first'=>Article::where('top_first', true)->first(),
            'top_second'=>Article::where('top_second', true)->first(),
            'top_third'=>Article::where('top_third', true)->first()
    	]);
    }

    public function date(Request $request, string $year, string $month)
    {
        $dates = Article::selectRaw('year(created_at) `year`, month(created_at) `month`, monthname(created_at) `monthName`, count(created_at) `count`')
        ->groupBy('year', 'month', 'monthName')
        ->orderBy('year')
        ->orderBy('month')
        ->get();
        
        return view('pages.welcome', [
            'articles' => Article::getByDate($year, $month)->simplePaginate(config('custom.paginate_quote')),
            'categories' => Category::all(),
            'dates' => $dates,
            'top_first'=>Article::where('top_first', true)->first(),
            'top_second'=>Article::where('top_second', true)->first(),
            'top_third'=>Article::where('top_third', true)->first()
        ]);
    }
}
