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
Route::redirect('/', '/index');
Route::get('/index', 'IndexController@index');
Route::get('/signup', 'SignUpController@index');
Route::post('/signup', 'SignUpController@signup');
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'AdminController@logout');

Route::post('/editpost/{id}', 'PostController@storeEdit');
Route::get('/editpost/{id}', 'PostController@index');
Route::get('/editpost/{id}/delete', 'PostController@delete');
Route::get('/post', 'PostController@index');
Route::post('/post', 'PostController@store');
Route::get('/post/your-post', 'PostController@show');

Route::middleware(['authenticated'])->group(function(){
	Route::get('/profile', 'AdminController@index');
});
