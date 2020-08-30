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

// Route::middleware(['auth', 'isAdmin'])->group(function(){
  Route::get('dashboard','PageController@dashboard')->name('admin.dashboard');
  Route::get('content','PageController@content')->name('admin.content');
  Route::get('user','PageController@user')->name('admin.user');
// });

// example purpose
// Route::livewire('dashboard', 'admin.navbar')->layout('admin.layouts.master');