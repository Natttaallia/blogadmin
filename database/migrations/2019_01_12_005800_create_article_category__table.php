<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_category_', function (Blueprint $table) {
            $table->increments('id');
            //$table->foreign('article_id')->references('id')->on('articles_');
            $table->integer('article_id');
            //$table->foreign('category_id')->references('id')->on('_categories_');
            $table->integer('category_id');
            
            $table->unique(['article_id', 'category_id']);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_category_');
    }
}
