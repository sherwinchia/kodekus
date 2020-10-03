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

Route::middleware(['admin.auth','isAdmin'])->group(function () {
  
  //Dashboard
  Route::get('dashboard','Dashboard\Web\DashboardController@index')->name('dashboard.index');

  //Article
  Route::resource('articles','Article\Web\ArticleController')->name('*','articles')->only('index','create','edit');

  //Category
  Route::resource('categories','Category\Web\CategoryController')->name('*','categories')->only('index','create','edit');

  //Tag
  Route::resource('tags','Tag\Web\TagController')->name('*','tags')->only('index','create','edit');

  //User
  Route::resource('users','User\Web\UserController')->name('*','users')->only('index','create','edit');

  //Role
  Route::resource('roles','Role\Web\RoleController')->name('*','roles')->only('index','create','edit');

  //Permission
  Route::resource('permissions','Permission\Web\PermissionController')->name('*','permissions')->only('index','create','edit');

  //Advertisement
  Route::resource('advertisements','Advertisement\Web\AdvertisementController')->name('*','advertisements')->only('index','create','edit');
  
  //File
  // Route::livewire('files','admin.files.index')->name('files.index');

  //Log
  Route::get('logs','Log\Web\LogController@index')->name('logs.index');

  //Backup
  Route::get('backups','Backup\Web\BackupController@index')->name('backups.index');

  Route::get('profile','Core\ProfileController@show')->name('profile.show');
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