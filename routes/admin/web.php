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

Route::group(['prefix' => 'admin'], function () {
  Auth::routes();
});

Route::layout('admin.layouts.master')->section('content')->group(function () {
  
  //Dashboard
  Route::livewire('dashboard','admin.dashboard.index')->name('dashboard.index');

  //Article
  Route::get('articles','Article\Web\ArticleController@index')->name('articles.index');
  Route::get('articles/create','Article\Web\ArticleController@create')->name('articles.create');
  Route::get('articles/{article}','Article\Web\ArticleController@edit')->name('articles.edit');

  //Category
  Route::get('categories','Category\Web\CategoryController@index')->name('categories.index');
  Route::get('categories/create','Category\Web\CategoryController@create')->name('categories.create');
  Route::get('categories/{category}','Category\Web\CategoryController@edit')->name('categories.edit');

  //Tag
  Route::get('tags','Tag\Web\TagController@index')->name('tags.index');
  Route::get('tags/create','Tag\Web\TagController@create')->name('tags.create');
  Route::get('tags/{tag}','Tag\Web\TagController@edit')->name('tags.edit');

  //User
  Route::livewire('users','admin.users.index')->name('users.index');

  //Role
  Route::livewire('roles','admin.roles.index')->name('roles.index');

  //Permission
  Route::livewire('permissions','admin.permissions.index')->name('permissions.index');

  //Advertisement
  Route::livewire('advertisements','admin.advertisements.index')->name('advertisements.index');
  
  //File
  Route::livewire('files','admin.files.index')->name('files.index');

  //Log
  Route::livewire('logs','admin.logs.index')->name('logs.index');

  //Backup
  Route::livewire('backups','admin.backups.index')->name('backups.index');
});