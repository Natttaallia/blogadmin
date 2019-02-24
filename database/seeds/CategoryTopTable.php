<?php

use Illuminate\Database\Seeder;
use App\Models\CategoryTop;
use App\Models\Category;
use App\Models\ArticleCategory;

class CategoryTopTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // factory(CategoryTop::class, Category::all()->count())->create();
        foreach (Category::all() as $cat) {
        	$ct=new CategoryTop();
        	$ct->category_id=$cat->id;
        	$ct->first_id=ArticleCategory::where('category_id',$cat->id)->first()->article_id;
        	$ct->second_id=ArticleCategory::where('category_id',$cat->id)->get()->random()->article_id;
        	$ct->third_id=ArticleCategory::where('category_id',$cat->id)->get()->last()->article_id;
        	$ct->save();
        }

    }
}
