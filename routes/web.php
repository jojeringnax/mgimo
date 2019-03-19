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

Route::get('en/anniversary', function(){
    return view('anniversary_en');
});

Route::get('anniversary', function() {
    return view('anniversary');
});

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function(){
    Route::get('/','SiteController@index');

    Route::get('news', App::getLocale() == 'ru' ? 'NewsController@index' : App::getLocale().'\NewsController@index');
    Route::get('news/show/{id}', App::getLocale() == 'ru' ? 'NewsController@show' : App::getLocale().'\NewsController@show');

    Route::get('media', App::getLocale() == 'ru' ? 'SmiController@index' : App::getLocale().'\SmiController@index');
    Route::get('books', App::getLocale() == 'ru' ? 'BookController@index' : App::getLocale().'\BookController@index');
    Route::get('books/show/{id}', App::getLocale() == 'ru' ? 'BookController@show' : App::getLocale().'\BookController@show');

    Route::get('events', App::getLocale() == 'ru' ? 'EventsController@index' : App::getLocale().'\EventsController@index');
    Route::get('events/show/{id}', App::getLocale() == 'ru' ? 'EventsController@show' : App::getLocale().'\EventsController@show');

    Route::get('congratulations', App::getLocale() == 'ru' ? 'CongratulationController@index' : App::getLocale().'\CongratulationController@index');

    Route::get('gallery', App::getLocale() == 'ru' ? 'PhotoController@index' : App::getLocale().'\PhotoController@index');
    Route::get('gallery/show/{id}', App::getLocale() == 'ru' ? 'PhotoController@show' : App::getLocale().'\PhotoController@show');

    Route::get('smis', App::getLocale() == 'ru' ? 'SmiController@index' : App::getLocale().'\SmiController@index');

    //Route::get('media', 'SmiController@index');
    //Route::get('books', 'BookController@index');
    //Route::get('books/show/{id}', 'BookController@show');
    //Route::get('events', 'EventsController@index');
    //Route::get('events/show/{id}', 'EventsController@show');
    //Route::get('congratulations', 'CongratulationController@index');
    //Route::get('gallery', 'PhotoController@index');
    //Route::get('gallery/show/{id}', 'PhotoController@show');
    //Route::get('smis', 'SmiController@index');
    //Route::get('partners', 'PartnerController@index');

    Route::get('contacts', function() {
        return view('contacts');
    });

    Route::get('partners', App::getLocale() == 'ru' ? 'PartnerController@index' : App::getLocale().'\PartnerController@index');
});

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

Route::get('/admin', 'AdminController@index')->name('admin');


Route::get('admin/news', function() {
    return view('admin.news.index', ['news' => \App\News::all()]);
})->name('news_index');

Route::get('test', function() {
    return view('test');
});

Route::get('admin/events', function() {
    return view('admin.events.index', [
        'events' => \App\Event::all(),
        'mainFile' => \App\Event::getMainFilePhotoModel()
    ]);
})->name('events_index');

Route::post('admin/events', 'AdminController@addFileEvents');

Route::get('events/get_by_location/{location}', 'EventsController@getByLocation');

Route::get('admin/gallery', function() {
    return view('admin.gallery.index', ['albums' => \App\Album::all()]);
})->name('album_index');

Route::post('admin/gallery/deletePhotos', 'PhotoController@deletePhotos');
Route::get('news/add_news/{data}', 'NewsController@addNews');
Route::get('events/add_events/{data}', 'EventsController@addEvents');
Route::get('add_smis/{data}', 'SmiController@add_smis');


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
    return view('admin.partners.index', [
        'partnersCompany' => \App\Partner::where('type', \App\Partner::TYPE_COMPANY)->get(),
        'partnersIndividual' => \App\Partner::where('type', \App\Partner::TYPE_INDIVIDUAL)->get()
    ]);
})->name('partners_index');

Route::get('admin/subscribers', function() {
    return view('admin.subscribers.index', ['subscribers' => \App\Subscriber::all()]);
})->name('subscribers_index');


/**
 * Eng routes
 *
 *
 *
 */


Route::get('photo/delete/{id}', 'en\PhotoController@delete');


Route::match(['get','post'], 'admin/en/smis/create', 'en\AdminController@createSmi');
Route::match(['get','post'], 'admin/en/smis/update/{id}', 'en\AdminController@updateSmi');
Route::get('admin/en/smis/delete/{id}', 'en\AdminController@deleteSmi');

Route::match(['get','post'], 'admin/en/gallery/create', 'en\AdminController@createAlbum');
Route::match(['get','post'], 'admin/en/gallery/create/{id}', 'en\AdminController@albumFill');

Route::match(['get','post'], 'admin/en/news/create', 'en\AdminController@createArticle');
Route::match(['get','post'], 'admin/en/news/update/{id}', 'en\AdminController@updateArticle');
Route::get('admin/en/news/delete/{id}', 'en\AdminController@deleteArticle');

Route::match(['get','post'], 'admin/en/events/create', 'en\AdminController@createEvent');
Route::match(['get','post'], 'admin/en/events/update/{id}', 'en\AdminController@updateEvent');
Route::get('admin/en/events/delete/{id}', 'en\AdminController@deleteEvent');

Route::match(['get','post'], 'admin/en/congratulations/create', 'en\AdminController@createCongratulation');
Route::match(['get','post'], 'admin/en/congratulations/update/{id}', 'en\AdminController@updateCongratulation');
Route::get('admin/en/congratulations/delete/{id}', 'en\AdminController@deleteCongratulation');

Route::match(['get','post'], 'admin/en/books/create', 'en\AdminController@createBook');
Route::match(['get','post'], 'admin/en/books/update/{id}', 'en\AdminController@updateBook');
Route::get('admin/en/books/delete/{id}', 'en\AdminController@deleteBook');


Route::match(['get','post'], 'admin/en/partners/create', 'en\AdminController@createPartner');
Route::match(['get','post'], 'admin/en/partners/update/{id}', 'en\AdminController@updatePartner');
Route::get('admin/en/partners/delete/{id}', 'en\AdminController@deletePartner');


Route::match(['get','post'], 'admin/en/gallery/create', 'en\AdminController@createAlbum');
Route::match(['get','post'], 'admin/en/gallery/update/{id}', 'en\AdminController@updateAlbum');
Route::get('admin/en/gallery/delete/{id}', 'en\AdminController@deleteAlbum');

Route::match(['get','post'], 'admin/en/subscribers/create', 'en\AdminController@createSubscriber');
Route::match(['get','post'], 'admin/en/subscribers/update/{id}', 'en\AdminController@updateSubscriber');
Route::get('admin/en/subscribers/delete/{id}', 'en\AdminController@deleteSubscriber');


Route::match(['get','post'], 'admin/en/gallery/album_fill/{id}', 'en\AdminController@albumFill')->name('album_fill_en');

Auth::routes();

Route::get('/admin/en', 'en\AdminController@index')->name('admin_en');


Route::get('admin/en/news', function() {
    return view('admin.en.news.index', ['news' => \App\en\News::all()]);
})->name('news_index_en');

Route::get('test', function() {
    return view('test');
});

Route::get('admin/en/events', function() {
    return view('admin.en.events.index', [
        'events' => \App\en\Event::all(),
        'mainFile' => \App\en\Event::getMainFilePhotoModel()
    ]);
})->name('events_index_en');

Route::post('admin/en/events', 'en\AdminController@addFileEvents');

Route::get('events/en/get_by_location/{location}', 'en\EventsController@getByLocation');

Route::get('admin/en/gallery', function() {
    return view('admin.en.gallery.index', ['albums' => \App\Album::all()]);
})->name('album_index_en');

Route::post('admin/en/gallery/deletePhotos', 'en\PhotoController@deletePhotos');
Route::get('news/en/add_news/{data}', 'en\NewsController@addNews');
Route::get('events/en/add_events/{data}', 'en\EventsController@addEvents');
Route::get('add_smis/en/{data}', 'en\SmiController@add_smis');


Route::get('congratulations/en/add_congratulations/{data}', 'CongratulationController@addCongratulations');
Route::get('books/en/en/add_books/{data}', 'BookController@addBooks');
Route::get('gallery/en/add_albums/{data}', 'PhotoController@addAlbums');
Route::get('gallery/en/delete_album/{id}', 'PhotoController@deleteAlbum');
Route::get('gallery/en/albums/{date}', 'PhotoController@getFiltred');


Route::get('admin/en/congratulations', function() {
    return view('admin.en.congratulations.index', ['congratulations' => \App\en\Congratulation::all()]);
})->name('congratulations_index_en');

Route::get('admin/en/books', function() {
    return view('admin.en.books.index', ['books' => \App\en\Book::all()]);
})->name('books_index_en');

Route::get('admin/en/smis', function() {
    return view('admin.en.smis.index', ['smis' => \App\en\Smi::all()]);
})->name('smis_index_en');

Route::get('admin/en/partners', function() {
    return view('admin.en.partners.index', [
        'partnersCompany' => \App\en\Partner::where('type', \App\en\Partner::TYPE_COMPANY)->get(),
        'partnersIndividual' => \App\en\Partner::where('type', \App\en\Partner::TYPE_INDIVIDUAL)->get()
    ]);
})->name('partners_index_en');

Route::get('admin/en/subscribers', function() {
    return view('admin.en.subscribers.index', ['subscribers' => \App\en\Subscriber::all()]);
})->name('subscribers_index_en');







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
        'article' => \App\tashkent\Article::findOrFail($id)
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
        'event' => \App\tashkent\Event::findOrFail($id)
    ]);
})->name('updateEventTashkent');


Route::post('admin/tashkent/program/create', 'tashkent\AdminController@storeProgram');
Route::post('admin/tashkent/program/update/{id}', 'tashkent\AdminController@storeProgram');
Route::get('admin/tashkent/program/delete/{id}', 'tashkent\AdminController@deleteProgram');

Route::get('admin/tashkent/program/is_exist_all_day/{date}', 'tashkent\AdminController@isExistForTodayForAllDay');



/**
 * TASHKENT ROUTES ENGLISH
 */


Route::get('admin/tashkent/en', 'tashkent\en\AdminController@index')->name('adminIndexTashkent_en');

Route::get('admin/tashkent/en/news', 'tashkent\en\AdminController@news')->name('newsAdminIndexTashkent_en');

Route::post('admin/tashkent/en/news/create', 'tashkent\en\AdminController@storeArticle');
Route::post('admin/tashkent/en/news/update/{id}', 'tashkent\en\AdminController@storeArticle');

Route::get('admin/tashkent/en/news/delete/{id}', 'tashkent\en\AdminController@deleteArticle');
Route::get('admin/tashkent/en/news/update/{id}', function ($id) {
    return view('tashkent.admin.news.update', [
        'article' => \App\tashkent\en\Article::findOrFail($id)
    ]);
})->name('updateArticleTashkent_en');

Route::get('admin/tashkent/en/news/create', function () {
    return view('tashkent.admin.news.create');
})->name('createArticleTashkent_en');



Route::get('admin/tashkent/en/program', 'tashkent\en\AdminController@program');
Route::get('admin/tashkent/en/program/create', function() {
    return view('tashkent.admin.program.create');
})->name('createEventTashkent_en');

Route::get('admin/tashkent/en/program/update/{id}', function ($id) {
    return view('tashkent.admin.program.update', [
        'event' => \App\tashkent\en\Event::findOrFail($id)
    ]);
})->name('updateEventTashkent_en');


Route::post('admin/tashkent/en/program/create', 'tashkent\en\AdminController@storeProgram');
Route::post('admin/tashkent/en/program/update/{id}', 'tashkent\en\AdminController@storeProgram');
Route::get('admin/tashkent/en/program/delete/{id}', 'tashkent\en\AdminController@deleteProgram');

Route::get('admin/tashkent/en/program/is_exist_all_day/{date}', 'tashkent\en\AdminController@isExistForTodayForAllDay');





Route::get('setlocale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[1], App\Http\Middleware\LocaleMiddleware::$languages)) {

        unset($segments[1]); //удаляем метку
    }

    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    if ($lang != App\Http\Middleware\LocaleMiddleware::$mainLanguage){
        array_splice($segments, 1, 0, $lang);
    }

    //формируем полный URL
    $url = Request::root().implode("/", $segments);

    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url); //Перенаправляем назад на ту же страницу

})->name('setlocale');