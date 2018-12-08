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

Route::get('media', 'SmiController@index');

Route::get('news', 'NewsController@index');

Route::get('news/show/{id}', 'NewsController@show');



Route::get('events', 'EventsController@index');

Route::get('publish', function () {
    return view('publish');
});

Route::get('congratulations', function () {
    return view('congratulations');
});

Route::get('partners', function () {
    return view('partners');
});

Route::get('gallery', function () {
    return view('gallery');
});

Route::get('news_layout', function () {
    return view('news_layout');
});

Route::get('gallery_layout', function () {
    return view('gallery_layout');
});






/**
 * Admin routes
 */
Route::get('admin/news/create', function () {
    return view('admin/news/create');
});

Route::get('admin/events/create', function () {
    return view('admin/events/create');
});

Route::get('admin/smis/create', function () {
    return view('admin/smis/create');
});



Route::match(['get','post'], 'admin/smis/update/{id}', 'AdminController@updateSmi');

Route::post('admin/smis/create', array('before' => 'csrf', 'uses' => 'AdminController@createSmi'));

Route::post('admin/news/create', array('before' => 'csrf', 'uses' => 'AdminController@createArticle'));
Route::get('admin/news/delete/{id}', 'AdminController@deleteArticle');

Route::post('admin/events/create', array('before' => 'csrf', 'uses' => 'AdminController@createEvent'));
Route::get('admin/events/delete/{id}', 'AdminController@deleteEvent');



