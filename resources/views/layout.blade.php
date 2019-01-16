<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>75 лет МГИМО</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/mdb.css') }}">
    <script src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script>
        $(document).ready( function() {
            $('a#{{ request('active') }}').addClass('active-link');
        });
    </script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(51858437, "init", {
            id:51858437,
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/51858437" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    @yield('link')
</head>
<body>
<div class="arrow-top hide"></div>
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
                            <li class="nav-item"><a class="nav-link" id="main" href="{{url('/')}}">Главная</a></li>
                            <li class="nav-item"><a class="nav-link" id="anniversary" href="{{url('anniversary')}}">О юбилее</a></li>
                            <li class="nav-item"><a class="nav-link" id="news" href={{url('news')}}>Новости</a></li>
                            <li class="nav-item"><a class="nav-link" id="events" href="{{url('events')}}">Мероприятия</a></li>
                            <li class="nav-item"><a class="nav-link" id="congratulations" href="{{url('congratulations')}}">Поздравления</a></li>
                            <li class="nav-item"><a class="nav-link" id="books" href="{{url('books')}}">Издательская программа</a></li>
                            <li class="nav-item"><a class="nav-link" id="gallery" href="{{url('gallery')}}">Галерея</a></li>
                            <li class="nav-item"><a class="nav-link" id="partners" href="{{url('partners')}}">Партнеры</a></li>
                            <li class="nav-item"><a class="nav-link" id="smis" href="{{url('smis')}}">СМИ</a></li>
                            <li class="nav-item"><a class="nav-link" id="contacts" href="{{url('contacts')}}">Контакты</a></li>
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
    <script>
        $(document).ready( function() {
            $('.close').click(function(){
                $('.subscribe-form').removeClass('hide');
                $('.modal-title').html('<h4>'+ 'Подписаться на новости'+ '</h4>')
            });

            $('.subscribe-form').submit( function(e) {
                e.preventDefault();
                $('#sub_news-course').attr('value',  $('#sub_news-course').val() ? '' : 0);
                $('#sub_news-faculty').attr('value',  $('#sub_news-faculty').val() ? '' : 0);
                $('#sub_news-work').attr('value',  $('#sub_news-work').val() ? '' : 0);
                $('#sub_news-post').attr('value',  $('#sub_news-post').val() ? '' : 0);
                $.ajax({
                    url: "{{ url('admin/subscribers/create') }}",
                    dataType: 'json',
                    data: $(this).serialize(),
                    type: 'POST',
                    error: function(data) {
                        $('.modal-title').html('<span>'+'К сожалению, что-то пошло не так. Пожалуйста, напишите нам на почту: mgimo@yandex.ru. В ближайшее время мы все починим!'+'</span>');
                        $('.subscribe-form').addClass('hide');
                        document.querySelector('.subscribe-form').reset();
                    },
                    success: function(data) {
                        $('.modal-title').html('<span>'+'Ваша заявка успешно отправлена'+'</span>');
                        $('.subscribe-form').addClass('hide');
                        document.querySelector('.subscribe-form').reset();
                    }
                });
            });
        });
    </script>
    @yield('script')

    <footer>
        <div class="container">
            <div class="row">
                <div class="d-flex flex-wrap col-12 footers" style="padding: 0">
                    <div class="nav-bot col-xl-4 col-lg-4 col-md-6 col-12 align-items-stretch">
                        <nav class="d-flex" style="height: 100%">
                            <ul class="d-flex flex-column justify-content-between" style="padding: 0">
                                <li><a href="{{url('/')}}">Главная</a></li>
                                <li><a href="{{url('anniversary')}}">О юбилее</a></li>
                                <li><a href="{{url('news')}}">Новости</a></li>
                                <li><a href="{{url('events')}}">Мероприятия</a></li>
                                <li><a href="{{url('congratulations')}}">Поздравления</a></li>
                            </ul>
                            <ul class="d-flex flex-column justify-content-between"">
                                <li><a href="{{url('books')}}">Издательская программа</a></li>
                                <li><a href="{{url('gallery')}}">Галерея</a></li>
                                <li><a href="{{url('partners')}}">Партнеры</a></li>
                                <li><a href="{{url('smis')}}">СМИ</a></li>
                                <li><a href="">Контакты</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="button-footer col-xl-4 col-lg-4 col-md-6 col-12 align-items-center">
                        <a data-toggle="modal" data-target="#modalRegisterForm" href="#"><span></span>ПОДПИСАТЬСЯ НА НОВОСТИ</a>
                        <span class="text-center">
                            МГИМО 75<br>Ассоциация выпускников МГИМО<br>Эндаумент МГИМО
                        </span>
                    </div>
                    <div class="contact-footer col-xl-4 col-lg-4 col-md-6 col-12 align-items-stretch d-flex flex-column">
                        <span class="">
                            <span class="location-footer">Москва, проспект Вернадского, 76<br></span>
                            <span class="number-footer">+7 495 229-40-49</span>
                        </span>
                        <div class="soc-net d-flex justify-content-end">
                            <a target="_blank" href="https://vk.com/public175809098" class="item-soc-net vk"></a>
                            <a target="_blank" href="https://www.facebook.com/groups/284420799092549/about/" class="item-soc-net fb"></a>
                            <a target="_blank" href="https://www.instagram.com/alumni_mgimo/" class="item-soc-net inst"></a>
                            <a target="_blank" href="https://www.youtube.com/playlist?list=PLuF7IO74aQSJ-l67YvzYHoTJ-7GZ9YYAi" class="item-soc-net yt"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" id="sub" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Подписаться на новости</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(array('action' => 'AdminController@createSubscriber', 'class'=>'subscribe-form')) }}
            <div class="modal-body mx-3 subscribes">
                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input name="name" type="text" id="orangeForm-name" class="form-control validate" required>
                    <label data-error="Вы не ввели имя" data-success="Готово" for="orangeForm-name">*Ваше Имя</label>
                </div>
                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input name="email" type="email" id="sub_news-email" class="form-control validate" required>
                    <label data-error="Вы не ввели e-mail" data-success="right" for="orangeForm-email">*Ваш e-mail</label>
                </div>
                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input name="course" type="number" id="sub_news-course" class="form-control">
                    <label for="sub_news-course">Курс</label>
                </div>
                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input name="faculty" type="text" id="sub_news-faculty" class="form-control validate">
                    <label for="sub_news-faculty">Факультет</label>
                </div>
                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input name="work" type="text" id="sub_news-work" class="form-control validate">
                    <label for="sub_news-work">Место работы</label>
                </div>
                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input name="post" type="text" id="sub_news-post" class="form-control validate">
                    <label for="sub_news-post">Должность</label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn  btn-rounded btn-primary">Отправить заявку</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

</body>
</html>