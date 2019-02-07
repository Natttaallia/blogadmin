<?php

use Faker\Generator as Faker;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\DB;

$factory->define(ArticleCategory::class, function (Faker $faker) {
    return [
        'article_id' => rand(0, count(DB::table('articles_')->get()->toArray())-1),
        'category_id' => rand(0, count(DB::table('_categories_')->get()->toArray())-1)
    ];
});