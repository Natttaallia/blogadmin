<?php

use Faker\Generator as Faker;
use App\Models\Article;

$factory->define(Article::class, function (Faker $faker) {
	$faker->addProvider(new BlogArticleFaker\FakerProvider($faker));

    return [
        'title' => $faker->articleTitle,
        'content' => $faker->articleContent,
        'slug' => $faker->slug,
        'author_id' => $faker->biasedNumberBetween(0,100),
        'created_at' => $faker->dateTimeBetween('-1 years', 'now')
    ];
});
