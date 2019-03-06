@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-around">
                        {{ link_to('admin/tashkent', 'АДМИНКА ТАШКЕНТА', ['class' => 'link-admin card d-flex justify-content-center align-items-center text-center']) }}
                        {{ link_to('admin/tashkent/en', 'АДМИНКА ТАШКЕНТА EN', ['class' => 'link-admin card d-flex justify-content-center align-items-center text-center']) }}
                    </div>
                    <div class="card-body">
                        <a href="{{ url('register') }}">Добавить пользователя</a>
                        <div class="admin-sections d-flex flex-wrap">
                            <div id="news-adm" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 item-admin-dashboard">
                                {{ link_to('admin/news', 'НОВОСТИ', ['class' => 'card d-flex justify-content-center align-items-center']) }}
                            </div>
                            <div id="smis-adm" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 item-admin-dashboard">
                                {{ link_to('admin/smis', 'СМИ О НАС', ['class' => 'card d-flex justify-content-center align-items-center']) }}
                            </div>
                            <div id="events-adm" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 item-admin-dashboard">
                                {{ link_to('admin/events', 'МЕРОПРИЯТИЯ', ['class' => 'card d-flex justify-content-center align-items-center']) }}
                            </div>
                            <div id="congratulations-adm" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 item-admin-dashboard">
                                 {{ link_to('admin/congratulations', 'ПОЗДРАВЛЕНИЯ', ['class' => 'card d-flex justify-content-center align-items-center']) }}
                            </div>
                            <div id="books-adm" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 item-admin-dashboard">
                                {{ link_to('admin/books', 'КНИГИ', ['class' => 'card d-flex justify-content-center align-items-center']) }}
                            </div>
                            <div id="books-adm" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 item-admin-dashboard">
                                {{ link_to('admin/gallery', 'ГАЛЕРЕЯ', ['class' => 'card d-flex justify-content-center align-items-center']) }}
                            </div>
                            <div id="books-adm" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 item-admin-dashboard">
                                {{ link_to('admin/partners', 'ПАРТНЕРЫ', ['class' => 'card d-flex justify-content-center align-items-center']) }}
                            </div>
                            <div id="books-adm" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 item-admin-dashboard">
                                {{ link_to('admin/subscribers', 'ПОДПИСКИ', ['class' => 'card d-flex justify-content-center align-items-center']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

