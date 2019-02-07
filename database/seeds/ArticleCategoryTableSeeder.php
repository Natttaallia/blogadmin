<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Article;

class ArticleCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //factory(ArticleCategory::class, 50)->create();
        $categoryCount = Category::count();
        Article::all()->each(function($article) use ($categoryCount) {
            $count = rand(1, $categoryCount);
            for ($i = 0; $i < $count; $i++) {
                $catIds[] = rand(1, $categoryCount);
            }
            $article->categories()->attach(array_unique($catIds));
        });
    }
}
