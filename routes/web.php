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

Route::get('contacts', function() {
    return view('contacts');
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

Route::match(['get','post'], 'admin/subscribers/create', 'AdminController@createSubscriber');
Route::match(['get','post'], 'admin/subscribers/update/{id}', 'AdminController@updateSubscriber');
Route::get('admin/subscribers/delete/{id}', 'AdminController@deleteSubscriber');


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

Route::get('events/get_by_location/{location}', 'EventsController@getByLocation');

Route::get('admin/gallery', function() {
    return view('admin.gallery.index', ['albums' => \App\Album::all()]);
})->name('album_index');

Route::post('admin/gallery/deletePhotos', 'PhotoController@deletePhotos');
Route::get('news/add_news/{data}', 'NewsController@addNews');
Route::get('events/add_events/{data}', 'EventsController@addEvents');


Route::get('congratulations/add_congratulations/{data}', 'CongratulationController@addCongratulations');
Route::get('books/add_books/{data}', 'BookController@addBooks');
Route::get('gallery/add_albums/{data}', 'PhotoController@addAlbums');
Route::get('gallery/delete_album/{id}', 'PhotoController@deleteAlbum');
Route::get('gallery/albums/{date}', 'PhotoController@getFiltred');


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

Route::get('admin/subscribers', function() {
    return view('admin.subscribers.index', ['subscribers' => \App\Subscriber::all()]);
})->name('subscribers_index');





/**
 * TASHKENT ROUTES
 */


Route::get('admin/tashkent', 'tashkent\AdminController@index')->name('adminIndexTashkent');

Route::get('admin/tashkent/news', 'tashkent\AdminController@news')->name('newsAdminIndexTashkent');

Route::post('admin/tashkent/news/create', 'tashkent\AdminController@storeArticle');
Route::post('admin/tashkent/news/update/{id}', 'tashkent\AdminController@storeArticle');

Route::get('admin/tashkent/news/delete/{id}', 'tashkent\AdminController@deleteArticle');
Route::get('admin/tashkent/news/update/{id}', function ($id) {
    return view('tashkent.admin.news.update', [
        'article' => \App\tashkent\Article::find($id)->first()
    ]);
})->name('updateArticleTashkent');

Route::get('admin/tashkent/news/create', function () {
    return view('tashkent.admin.news.create');
})->name('createArticleTashkent');



Route::get('admin/tashkent/program', 'tashkent\AdminController@program');
Route::get('admin/tashkent/program/create', function() {
    return view('tashkent.admin.program.create');
})->name('createEventTashkent');

Route::get('admin/tashkent/program/update/{id}', function ($id) {
    return view('tashkent.admin.program.update', [
        'event' => \App\tashkent\Event::find($id)->first()
    ]);
})->name('updateEventTashkent');


Route::post('admin/tashkent/program/create', 'tashkent\AdminController@storeProgram');
Route::post('admin/tashkent/program/update/{id}', 'tashkent\AdminController@storeProgram');
Route::get('admin/tashkent/program/delete/{id}', 'tashkent\AdminController@deleteProgram');