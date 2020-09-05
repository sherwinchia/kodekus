<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// List articles (index table)
Route::get('articles','ArticleController@index');

// Show article 
Route::get('articles/{article}','ArticleController@show');

// Create article
Route::post('articles','ArticleController@store');

// Update article
Route::put('articles','ArticleController@update');

// Remove article
Route::post('articles/{article}','ArticleController@destroy');