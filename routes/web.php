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

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hallo', function () {
    return 'Hello world! Halo semuanya, selamat belajar Laravel.';
});
*/

Route::group(['middleware' => ['roles']],function () {
	Route::group(['roles' => 'USER'], function () {
		Route::get('user/list', 'UserController@list');
		Route::get('user/edit', 'UserController@edit');
	});
});
Route::get('login', ['as' => 'login', 'uses' => 'AdminController@login']);
