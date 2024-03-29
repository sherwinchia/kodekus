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

Route::middleware(['guest:admin'])->group(function () {
  Route::get('login', 'Core\AuthController@showLogin')->name('login.show');

});

Route::get('logoutuser', 'Core\AuthController@logout')->name('logoutuser');

Route::middleware(['admin.auth:admin', 'role:admin|content-writer'])->group(function () {

  //Dashboard
  Route::get('dashboard', 'Dashboard\DashboardController@index')->name('dashboard.index');

  //Article
  Route::resource('articles', 'Article\ArticleController')->name('*', 'articles')->only('index', 'create', 'edit');
  Route::get('preview-article/{article}', 'Article\ArticleController@preview')->name('articles.preview');

  //Category
  Route::resource('categories', 'Category\CategoryController')->name('*', 'categories')->only('index', 'create', 'edit');

  //Tag
  Route::resource('tags', 'Tag\TagController')->name('*', 'tags')->only('index', 'create', 'edit');

  //Series
  Route::resource('series', 'Series\SeriesController')->name('*', 'series')->only('index', 'create', 'edit');

  //Comments
  Route::get('comments/approval', 'Comment\CommentController@approval')->name('comments.approval');
  Route::resource('comments', 'Comment\CommentController')->name('*', 'comments')->only('index', 'show');

  //Quizzes
  Route::resource('quizzes', 'Quiz\QuizController')->name('*', 'quizzes')->only('index', 'create', 'edit');

  //User
  Route::resource('users', 'User\UserController')->name('*', 'users')->only('index', 'create', 'edit');

  //Role
  // Route::resource('roles', 'Role\RoleController')->name('*', 'roles')->only('index', 'create', 'edit');

  //Permission
  // Route::resource('permissions', 'Permission\PermissionController')->name('*', 'permissions')->only('index', 'create', 'edit');

  //Guard
  // Route::resource('guards', 'Guard\GuardController')->name('*', 'guards')->only('index', 'create', 'edit');

  //Advertisement
  Route::resource('advertisements', 'Advertisement\AdvertisementController')->name('*', 'advertisements')->only('index', 'create', 'edit');

  //Pages
  Route::resource('pages', 'Page\PageController')->name('*', 'pages')->only('index', 'create', 'edit');

  //File
  // Route::livewire('files','admin.files.index')->name('files.index');

  //Log
  Route::get('logs', 'Log\LogController@index')->name('logs.index');

  //Backup
  Route::get('backups', 'Backup\BackupController@index')->name('backups.index');

  Route::get('profile', 'Core\ProfileController@show')->name('profile.show');
  // Route::post()->name('profile.update.password');
  // Route::post()->name('profile.update.profile');

  //Logout
  Route::get('logout', 'Core\AuthController@logout')->name('logout');

  //Root
  Route::get('/', 'Core\WelcomeController@index')->name('welcome');

});
