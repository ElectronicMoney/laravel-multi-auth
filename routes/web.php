<?php

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

Route::get('/', function () {
    return view('welcome');
});


//User Authentication Login
Route::group(['prefix' => 'users'], function () {
    Auth::routes();
    Route::get('/dashboard', 'HomeController@index')->name('user.dashboard');
});

//Admin Authentication Login
Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', 'Auth\AdminLoginController@showAdminLoginForm')->name('get.admin.login');
    Route::post('/login', 'Auth\AdminLoginController@adminLogin')->name('post.admin.login');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
});


