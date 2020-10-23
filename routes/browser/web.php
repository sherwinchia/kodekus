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


Route::get('sign-in/{provider}', 'Auth\SocialiteController@redirect')->name('login.socialite');
Route::get('sign-in/{provider}/callback', 'Auth\SocialiteController@handleCallback')->name('login.socialite.callback');
Route::get('login','Auth\AuthController@show')->name('login.show');

//Author
Route::get('author/{author}', 'Author\AuthorController@show')->name('authors.show');

//Article
Route::get('article/{category}/{slug}','Article\ArticleController@show')->name('articles.show');

//Search
Route::get('search','Search\SearchController@index')->name('search.index');

//Series
Route::get('series','Series\SeriesController@index')->name('series.index');

//Home
Route::get('/','Home\HomeController@index')->name('home.index');

//Root
Route::middleware('browser.auth')->group(function(){
  Route::get('profile','Profile\ProfileController@show')->name('profile.show');
  Route::get('logout','Auth\AuthController@logout')->name('logout');
});


