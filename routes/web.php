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

Route::get('media', function () {
    return view('media');
});

Route::get('admin/news/create', function () {
    return view('admin/news/create');
});
Route::post('admin/news/create', array('before' => 'csrf', 'uses' => 'AdminController@createNews'));

Route::post( 'media', array('before' => 'csrf',  'uses' => 'PhotoController@show'));

