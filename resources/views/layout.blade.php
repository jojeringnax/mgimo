<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MGIMO75</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mdb/assets/css/docs.css') }}">
    @yield('link')
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="logo col-1 d-flex justify-content-center align-items-center">
                    <a class="navbar-brand" href="/public">MGIMO</a>
                </div>
                <nav class=" navbar-main col-10" style="width:100%;">
                    <ul class="nav nav-tabs d-flex justify-content-around">
                        <li class="nav-item"><a class="nav-link" href="#">О юбилее</a></li>
                        <li class="nav-item"><a class="nav-link" href="news">Новости</a></li>
                        <li class="nav-item"><a class="nav-link" href="events">Мероприятия</a></li>
                        <li class="nav-item"><a class="nav-link" href="congratulations">Поздравления</a></li>
                        <li class="nav-item"><a class="nav-link" href="publish">Издательская программа</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery">Галерея</a></li>
                        <li class="nav-item"><a class="nav-link" href="partners">Партнеры</a></li>
                    </ul>
                </nav>
                <div class="soc-net col-1 d-flex align-items-center justify-content-between">
                    <div class="">
                        <i>VK</i>
                    </div>
                    <div class="">
                        <i>IN</i>
                    </div>
                    <div class="">
                        <i>FB</i>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')
    <script src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/tooltip.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-material-design.js')}}"></script>
    @yield('script')

</body>
</html>