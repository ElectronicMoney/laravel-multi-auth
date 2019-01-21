<?php

use App\Exceptions\CustomException;

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
// Route::group(['prefix' => 'users'], function () {
//     Auth::routes();
//     // Route::get('/login', 'Auth\LoginController@showLogin')->name('get.users.login');
//     // Route::post('/login', 'Auth\LoginController@showLogin')->name('users.login');
//     // Route::get('/register', 'Auth\LoginController@showLogin')->name('users.register');

//     // Route::get('/login', function () {
//     //     return view('users.auth.login');
//     // })->name('get.users.login');

//     // Route::get('/register', function () {
//     //     return view('users.auth.register');
//     // })->name('get.users.register');

//     // Route::get('/password/email', function () {
//     //     return view('users.auth.passwords.email');
//     // })->name('get.user.password.email');

//     // Route::get('/password/reset', function () {
//     //     return view('users.auth.passwords.reset');
//     // })->name('get.user.password.reset');


// });

Auth::routes();
Route::get('user/dashboard', 'HomeController@index')->name('get.user.dashboard');

//Admin Authentication Login
Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', 'Auth\AdminLoginController@showAdminLoginForm')->name('get.admin.login');
    Route::post('/login', 'Auth\AdminLoginController@adminLogin')->name('post.admin.login');
    Route::get('/dashboard', 'AdminController@index')->name('get.admin.dashboard');
});


