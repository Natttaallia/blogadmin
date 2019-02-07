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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
