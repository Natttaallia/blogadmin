<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Article;

class UpdateTopArticleController extends Controller
{
    public function update_top(Request $request)
    {
    	$id = $request->article_id;
    	Article::where('top_first', true)->update(['top_first' => 0]);
    	$a = Article::find($id);

        $a->top_first = true;
        $a->top_second = false;
        $a->top_third = false;

        $a->save();
    	return response()->json([
    		'status' => 'ok', 
    		'data' => Article::where('id', $id)->get()
    	]);
    }
    public function update_top_second(Request $request)
    {
        Article::where('top_second', true)->update(['top_second' => 0]);
        dd($request->article_id);
        Article::where('id', $request->article_id)->update([
            'top_first' => 0,
            'top_second' => 1,
            'top_third' => 0
        ]);

    	return response()->json(['status' => 'ok']);
    }
    public function update_top_third(Request $request)
    {
        Article::where('top_third', true)->update(['top_third' => 0]);
        Article::where('id', $request->article_id)->update([
            'top_first' => 0,
            'top_second' => 0,
            'top_third' => 1
        ]);
    	return response()->json(['status' => 'ok']);
    }
}
