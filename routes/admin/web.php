<?php

use Illuminate\Http\Request;
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

// Route::group(['prefix' => 'admin'], function () {
//   Auth::routes();
// });

Route::middleware('auth')->group(function () {
  
  //Dashboard
  Route::get('dashboard','Dashboard\Web\DashboardController@index')->name('dashboard.index');

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
  Route::get('users','User\Web\UserController@index')->name('users.index');
  Route::get('users/create','User\Web\UserController@create')->name('users.create');
  Route::get('users/{user}','User\Web\UserController@edit')->name('users.edit');
  // Route::livewire('users','admin.users.index')->name('users.index');

  //Role
  Route::get('roles','Role\Web\RoleController@index')->name('roles.index');
  Route::get('roles/create','Role\Web\RoleController@create')->name('roles.create');
  Route::get('roles/{role}','Role\Web\RoleController@edit')->name('roles.edit');

  //Permission
  // Route::livewire('permissions','admin.permissions.index')->name('permissions.index');
  Route::get('permissions','Permission\Web\PermissionController@index')->name('permissions.index');
  Route::get('permissions/create','Permission\Web\PermissionController@create')->name('permissions.create');
  Route::get('permissions/{permission}','Permission\Web\PermissionController@edit')->name('permissions.edit');

  //Advertisement
  Route::livewire('advertisements','admin.advertisements.index')->name('advertisements.index');
  
  //File
  Route::livewire('files','admin.files.index')->name('files.index');

  //Log
  Route::get('logs','Log\Web\LogController@index')->name('logs.index');

  //Backup
  Route::get('backups','Backup\Web\BackupController@index')->name('backups.index');

  // Route::get()->name('profile.show');
  // Route::post()->name('profile.update.password');
  // Route::post()->name('profile.update.profile');

  //Logout
  Route::get('logout','Core\AuthController@logout')->name('logout');

  //Root
  Route::get('/','Core\WelcomeController@index')->name('welcome');
});

Route::middleware('guest')->group(function(){
  Route::get('login','Core\AuthController@showLogin')->name('login.show');
});