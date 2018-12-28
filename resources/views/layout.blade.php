<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MGIMO75</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/mdb.css') }}">
    <script src="{{asset('js/jquery-3.3.1.js')}}"></script>
    @yield('link')
</head>
<body>
<div class="arrow-top">
    <img src="img/arrow-top.svg" alt="">
</div>
    <header class="header" style="">
        <div class="container">
            <div class="row" style="width:100%;">
                <nav class="nav-top navbar navbar-expand-lg navbar-light fixed-top scrolling-navbar col-12 " style="width:100%; @yield('shadow'); @yield('color')">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="container navbar-nav d-flex justify-content-between" style="padding: 0">
                            <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Главная</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('anniversary')}}">О юбилее</a></li>
                            <li class="nav-item"><a class="nav-link" href={{url('news')}}>Новости</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('events')}}">Мероприятия</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('congratulations')}}">Поздравления</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('books')}}">Издательская программа</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('gallery')}}">Галерея</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('partners')}}">Партнеры</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('contacts')}}">Контакты</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    @yield('content')
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/mdb.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    @yield('script')
    <footer>
        <div class="container">
            <div class="row">
                <div class="d-flex flex-wrap col-12 footers" style="padding: 0">
                    <div class="nav-bot col-xl-4 col-lg-4 col-md-12 col-12 align-items-stretch">
                        <nav class="d-flex" style="height: 100%">
                            <ul class="d-flex flex-column justify-content-between" style="padding: 0">
                                <li><a href="{{url('/')}}">Главная</a></li>
                                <li><a href="{{url('anniversary')}}">О юбилее</a></li>
                                <li><a href="{{url('news')}}">Новости</a></li>
                                <li><a href="{{url('events')}}">Мероприятия</a></li>
                                <li><a href="{{url('congratulations')}}">Поздравления</a></li>
                            </ul>
                            <ul class="d-flex flex-column justify-content-start">
                                <li><a href="{{url('books')}}">Издательская программа</a></li>
                                <li style="margin-top: 7.5px"><a href="{{url('gallery')}}">Галерея</a></li>
                                <li style="margin-top: 7.5px"><a href="{{url('partners')}}">Партнеры</a></li>
                                <li style="margin-top: 7.5px"><a href="">Контакты</a></li>
                            </ul>
                        </nav>
                    </div>
                <div class="button-footer col-xl-4 col-lg-4 col-md-12 col-12 align-items-center">
                    <a href=""><span></span>ПОДПИСАТЬСЯ НА НОВОСТИ</a>
                    <span class="text-center">
                        МГИМО 75<br>Ассоциация выпускников МГИМО<br>Эндаумент МГИМО
                    </span>
                </div>
                <div class="contact-footer col-xl-4 col-lg-4 col-md-12 col-12 align-items-stretch d-flex flex-column">
                    <span class="">
                        <span class="location-footer">Москва, проспект Вернадского, 76<br></span>
                        <span class="number-footer">+7 495 229-40-49</span>
                    </span>
                    <div class="soc-net d-flex justify-content-end">
                        <a target="_blank" href="https://vk.com/" class="item-soc-net vk"></a>
                        <a target="_blank" href="https://www.facebook.com/" class="item-soc-net fb"></a>
                        <a target="_blank" href="https://www.instagram.com/" class="item-soc-net inst"></a>
                        <a target="_blank" href="https://www.youtube.com/" class="item-soc-net yt"></a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>