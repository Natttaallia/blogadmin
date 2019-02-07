<?php

use Faker\Generator as Faker;
use App\Models\ArticleTag;
use Illuminate\Support\Facades\DB;

$factory->define(ArticleTag::class, function (Faker $faker) {
    return [
        'article_id' => rand(0, count(DB::table('articles_')->get()->toArray())-1),
        'tag_id' => rand(0, count(DB::table('_tags_')->get()->toArray())-1)
    ];
});
