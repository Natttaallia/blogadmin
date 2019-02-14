<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImgToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles_', function (Blueprint $table) {
            $table->string('image');
            $table->integer('likes');
            $table->boolean('top_first');
            $table->boolean('top_second');
            $table->boolean('top_third');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles_', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('likes');
            $table->dropColumn('top_first');
            $table->dropColumn('top_second');
            $table->dropColumn('top_third');
        });
    }
}
