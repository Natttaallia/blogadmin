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
    	$a = Article::where('id', $id)->update(['top_first' => 1,'top_second' => 0,'top_third' => 0]);

    	// DB::table('articles_')
     //        ->where('id',  "$id")
     //        ->update(['top_second' => 0]);
     //    DB::table('articles_')
     //        ->where('id', "$id")
     //        ->update(['top_third' => 0]);
    	// DB::table('articles_')
     //        ->where('id', '!=' , "$id")
     //        ->update(['top_first' => 0]);
    	return response()->json([
    		'status' => 'ok', 
    		'data' => Article::where('id', $id)->get()->toArray()
    	]);
    }
    public function update_top_second(Request $request)
    {
    	// $id = $request->article_id;
    	// DB::table('articles_')
     //        ->where('id',  "$id")
     //        ->update(['top_first' => 0,'top_third' => 0]);
    	// DB::table('articles_')
     //        ->where('id', '!=' , "$id")
     //        ->update(['top_second' => 0]);
    	return response()->json(['status' => 'ok']);
    }
    public function update_top_third(Request $request)
    {
    	// $id = $request->article_id;
    	// DB::table('articles_')
     //        ->where('id',  "$id")
     //        ->update(['top_second' => 0,'top_first' => 0]);
    	// DB::table('articles_')
     //        ->where('id', '!=' , "$id")
     //        ->update(['top_third' => 0]);
    	return response()->json(['status' => 'ok']);
    }
}
