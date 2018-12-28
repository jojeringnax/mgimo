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

Route::get('/', 'SiteController@index');

Route::get('news', 'NewsController@index');
Route::get('news/show/{id}', 'NewsController@show');


Route::get('media', 'SmiController@index');

Route::get('books', 'BookController@index');
Route::get('books/show/{id}', 'BookController@show');

Route::get('events', 'EventsController@index');
Route::get('events/show/{id}', 'EventsController@show');

Route::get('congratulations', 'CongratulationController@index');

Route::get('gallery', 'PhotoController@index');
Route::get('gallery/show/{id}', 'PhotoController@show');

Route::get('smis', 'SmiController@index');

Route::get('anniversary', function() {
    return view('anniversary');
});

Route::get('partners', 'PartnerController@index');

/**
 * Admin routes
 */

Route::get('photo/delete/{id}', 'PhotoController@delete');


Route::match(['get','post'], 'admin/smis/create', 'AdminController@createSmi');
Route::match(['get','post'], 'admin/smis/update/{id}', 'AdminController@updateSmi');
Route::get('admin/smis/delete/{id}', 'AdminController@deleteSmi');

Route::match(['get','post'], 'admin/gallery/create', 'AdminController@createAlbum');
Route::match(['get','post'], 'admin/gallery/create/{id}', 'AdminController@albumFill');
//Route::get('admin/gallery/delete/{id}/{id}', 'AdminController@deleteAlbum');

Route::match(['get','post'], 'admin/news/create', 'AdminController@createArticle');
Route::match(['get','post'], 'admin/news/update/{id}', 'AdminController@updateArticle');
Route::get('admin/news/delete/{id}', 'AdminController@deleteArticle');

Route::match(['get','post'], 'admin/events/create', 'AdminController@createEvent');
Route::match(['get','post'], 'admin/events/update/{id}', 'AdminController@updateEvent');
Route::get('admin/events/delete/{id}', 'AdminController@deleteEvent');

Route::match(['get','post'], 'admin/congratulations/create', 'AdminController@createCongratulation');
Route::match(['get','post'], 'admin/congratulations/update/{id}', 'AdminController@updateCongratulation');
Route::get('admin/congratulations/delete/{id}', 'AdminController@deleteCongratulation');

Route::match(['get','post'], 'admin/books/create', 'AdminController@createBook');
Route::match(['get','post'], 'admin/books/update/{id}', 'AdminController@updateBook');
Route::get('admin/books/delete/{id}', 'AdminController@deleteBook');


Route::match(['get','post'], 'admin/partners/create', 'AdminController@createPartner');
Route::match(['get','post'], 'admin/partners/update/{id}', 'AdminController@updatePartner');
Route::get('admin/partners/delete/{id}', 'AdminController@deletePartner');


Route::match(['get','post'], 'admin/gallery/create', 'AdminController@createAlbum');
Route::match(['get','post'], 'admin/gallery/update/{id}', 'AdminController@updateAlbum');
Route::get('admin/gallery/delete/{id}', 'AdminController@deleteAlbum');


Route::match(['get','post'], 'admin/gallery/album_fill/{id}', 'AdminController@albumFill')->name('album_fill');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');


Route::get('admin/news', function() {
    return view('admin.news.index', ['news' => \App\News::all()]);
})->name('news_index');

Route::get('test', function() {
    return view('test');
});

Route::get('admin/events', function() {
    return view('admin.events.index', ['events' => \App\Event::all()]);
})->name('events_index');

Route::get('admin/gallery', function() {
    return view('admin.gallery.index', ['albums' => \App\Album::all()]);
})->name('album_index');

Route::post('admin/gallery/deletePhotos', 'PhotoController@deletePhotos');
Route::get('news/add_news/{data}', 'NewsController@addNews');
Route::get('events/add_events/{data}', 'EventsController@addEvents');
Route::get('congratulations/add_congratulations/{data}', 'CongratulationController@addCongratulations');


Route::get('admin/congratulations', function() {
    return view('admin.congratulations.index', ['congratulations' => \App\Congratulation::all()]);
})->name('congratulations_index');

Route::get('admin/books', function() {
    return view('admin.books.index', ['books' => \App\Book::all()]);
})->name('books_index');

Route::get('admin/smis', function() {
    return view('admin.smis.index', ['smis' => \App\Smi::all()]);
})->name('smis_index');

Route::get('admin/partners', function() {
    return view('admin.partners.index', ['partners' => \App\Partner::all()]);
})->name('partners_index');


