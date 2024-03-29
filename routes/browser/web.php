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

Route::middleware(['user.activated'])->group(function () {
  //Author
  Route::get('author/{slug}', 'Author\AuthorController@show')->name('authors.show');

  //Article
  Route::get('article/{category}/{slug}', 'Article\ArticleController@show')->name('articles.show');

  //Search
  Route::get('search', 'Search\SearchController@index')->name('search.index');

  //Series
  Route::get('series', 'Series\SeriesController@index')->name('series.index');

  //About
  Route::get('about', 'About\AboutController@index')->name('about.index');

  //Quiz
  Route::get('quiz', 'Quiz\QuizController@index')->name('quizzes.index');
  Route::get('quiz/{quiz}', 'Quiz\QuizController@show')->name('quizzes.show');

  //Home
  Route::get('/', 'Home\HomeController@index')->name('home.index');

  //Root
  Route::get('/root', 'Root\RootController@index')->name('root.index');

  Route::middleware('browser.auth:web')->group(function () {
    Route::get('profile', 'Profile\ProfileController@show')->name('profile.show');
  });
});

Route::middleware('guest:web')->group(function () {
  Route::get('auth', 'Auth\AuthController@show')->name('auth.show');
  Route::get('sign-in/{provider}', 'Auth\SocialiteController@redirect')->name('login.socialite');
  Route::get('sign-in/{provider}/callback', 'Auth\SocialiteController@handleCallback')->name('login.socialite.callback');
  Route::get('reset-password/{token}', 'Auth\AuthController@showResetPasswordForm')->name('auth.reset.show');
});

Route::middleware(['browser.auth:web'])->group(function () {
  Route::middleware('non.activated')->group(function () {
    Route::get('activate-account', 'Auth\AuthController@activate')->name('auth.activate');
  });
  Route::get('logout', 'Auth\AuthController@logout')->name('logout');
});

//Activation
Route::get('activation/{token}', 'Auth\AuthController@activateAccount')->name('auth.activation');
