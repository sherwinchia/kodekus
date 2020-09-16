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
  Route::delete('articles/{article}','Article\Web\ArticleController@delete')->name('articles.delete');


  //Category
  Route::livewire('categories','admin.categories.index')->name('categories.index');

  //Tag
  Route::livewire('tags','admin.tags.index')->name('tags.index');

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