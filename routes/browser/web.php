<?php

use Illuminate\Support\Facades\Route;


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


// Route::resource('articles','Article\Web\ArticleController')->name('*','articles')->only('index','show');
Route::get('{category}/{slug}','Article\ArticleController@show')->name('articles.show');
Route::get('/','Home\HomeController@index')->name('home.index');
Route::get('search','Search\SearchController@index')->name('search.index');

// Route::get('/', function () {
//   return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index');
