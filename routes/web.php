<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
// http://blog/category/interest
Route::get('/category/{slug}', 'CategoryController@index')->name('category');
Route::get('/article/{slug}', 'ArticleController@index')->name('article');
Route::get('/article/{year}/{month}', 'HomeController@date')->name('articles-date');


Route::get('/set_top_article', 'UpdateTopArticleController@update_top')->name('update_top_first');
Route::get('/set_top_second_article', 'UpdateTopArticleController@update_top_second')->name('update_top_second');
Route::get('/set_top_third_article', 'UpdateTopArticleController@update_top_third')->name('update_top_third');




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
