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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


	Route::get('/login/admin', 'Auth\AdminController@showAdminLoginForm');
    Route::get('/login/member', 'Auth\MemberController@showMemberLoginForm');
    Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
    Route::get('/register/member', 'Auth\RegisterController@showMemberRegisterForm');

    Route::post('/login/admin', 'Auth\AdminController@adminLogin');
    Route::post('/login/member', 'Auth\MemberController@memberLogin');
    Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
    Route::post('/register/member', 'Auth\RegisterController@createMember');

    Route::view('/home', 'home')->middleware('auth');
    Route::view('/admin', 'admin');
    Route::view('/member', 'member');
