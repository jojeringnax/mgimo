@extends('layout')
@section('link')
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
@endsection
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection
@section('color')
    background-color: white !important;
@endsection
@section('content')
    <div class="container" style="margin-top: 150px; padding-bottom: 120px">
        <div class="row d-flex flex-column">
            <div class="news-page">
                <div class="title-news-page d-flex" style="padding-left: 25px;">
                    <div class="btn-news-page d-flex flex-wrap">
                        <a  data-toggle="modal" data-target="#exampleModal" class="modal-button btn-news-page-add"><span></span>Добавить свою новость</a>
                        <a  data-toggle="modal" data-target="#modalRegisterForm" class="btn-news-page-sub"><span></span>Подписаться на новости</a>
                    </div>
                </div>
                <div class="news d-flex flex-wrap justify-content-start">
                    <div data-col="1" class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 d-flex flex-column flex-wrap">
                        @foreach($news as $article)
                            @if($loop->index%3 == 0 )
                                <a href="{{ url('news/show', ['id' => $article->id]) }}" class="item-card-news card" style="display:block;width: 100%">
                                    <img class="card-img-top" src="{{ $article->mainPhoto->path }}" alt="Card image cap">
                                    <div class="card-body d-flex flex-column align-items-start">
                                        <span class="tags-news-page">
                                         @foreach($article->getTags() as $tag)
                                                <span class="tag"><i></i><span>{{ $tag }}</span></span>
                                         @endforeach
                                        </span>
                                        <span class="title-card-news">{{ $article->title }}</span>
                                        <span class="date-news-page">{{ implode(' ', [date('d', strtotime($article->created_at)), \App\News::nameMonth[date('n', strtotime($article->created_at))], date('Y', strtotime($article->created_at))]) }}</span>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                    <div data-col="2" class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 d-flex flex-column flex-wrap">
                        @foreach($news as $article)
                            @if($loop->index%3 == 1 )
                                <a href={{url('news/show/'.$article->id)}}>
                                    <div class="item-card-news card" style="width: 100%">
                                        <img class="card-img-top" src="{{ $article->mainPhoto->path }}" alt="Card image cap">
                                        <div class="card-body d-flex flex-column align-items-start">
                                            <span class="tags-news-page">
                                                @foreach($article->getTags() as $tag)
                                                    <span class="tag"><i></i><span>{{ $tag }}</span></span>
                                                @endforeach
                                            </span>
                                            <span class="title-card-news">{{ $article->title }}</span>
                                            <span class="date-news-page">{{ implode(' ', [date('d', strtotime($article->created_at)), \App\News::nameMonth[date('n', strtotime($article->created_at))], date('Y', strtotime($article->created_at))]) }}</span>
                                            {{--<p class="card-text">{!! mb_strimwidth(strip_tags($article->content), 0, 200, '...')!!}</p>--}}
                                        </div>
                                        {{--{{ link_to('news/show/'.$article->id, 'Читать', ['class' => 'card-link news-show-link']) }}--}}
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                    <div data-col="3" class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 d-flex flex-column flex-wrap">
                        @foreach($news as $article)
                            @if($loop->index%3 == 2 )
                                <a href={{url('news/show/'.$article->id)}}>
                                    <div class="item-card-news card" style="width: 100%">
                                        <img class="card-img-top" src="{{ $article->mainPhoto->path }}" alt="Card image cap">
                                        <div class="card-body d-flex flex-column align-items-start">
                                            <span class="tags-news-page">
                                                @foreach($article->getTags() as $tag)
                                                    <span class="tag"><i></i><span>{{ $tag }}</span></span>
                                                @endforeach
                                            </span>
                                            <span class="title-card-news">{{ $article->title }}</span>
                                            <span class="date-news-page">{{ implode(' ', [date('d', strtotime($article->created_at)), \App\News::nameMonth[date('n', strtotime($article->created_at))], date('Y', strtotime($article->created_at))]) }}</span>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top:120px;">
                <div class="row d-flex justify-content-center">
                    <a id="btn-download-news-page" class="">Показать еще новости</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавьте свою новость</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                {{ Form::open(array('action' => 'AdminController@createSubscriber', 'files' => true, 'class'=>'news-form')) }}

                                {{ Form::label('title', 'Заголовок') }}
                                {{ Form::text('title', '',['class' => 'form-control item-form-news-add','placeholder' => 'Введите заголовок новости']) }}

                                <div id="editor" class="col-12 item-form-news-add"></div>
                                <input type="hidden" name="content" id="content-news"/>

                                <div class="d-flex col-12 flex-wrap item-form-news-add justify-content-between" style="margin-top: 25px">
                                    <div class="input-group col-xl-5 item-form-news-add">
                                        <div class="input-group-prepend clear">
                                            <span class="input-group-text" id="photo_area" data-file="главное"></span>
                                        </div>
                                        <div class="custom-file">
                                            {{ Form::file('photo', ['class' => 'input-default-js', 'area-describedby' => 'photo_area', 'id' => 'photo']) }}
                                            <label class="custom-file-label" for="photo">Загрузите первое фото</label>
                                        </div>
                                    </div>

                                    <div class="input-group col-xl-5 item-form-news-add">
                                        <div class="input-group-prepend clear">
                                            <span class="input-group-text" id="photo1_area" data-file="первое"></span>
                                        </div>
                                        <div class="custom-file">
                                            {{ Form::file('photo1', ['class' => 'input-default-js', 'area-describedby' => 'photo1_area', 'id' => 'photo1']) }}
                                            <label class="custom-file-label" for="photo1">Загрузите первое фото</label>
                                        </div>
                                    </div>
                                    <div class="input-group col-xl-5 item-form-news-add">
                                        <div class="input-group-prepend clear">
                                            <span class="input-group-text" id="photo2_area" data-file="второе"></span>
                                        </div>
                                        <div class="custom-file">
                                            {{ Form::file('photo2', ['class' => 'input-default-js', 'area-describedby' => 'photo2_area', 'id' => 'photo2']) }}
                                            <label class="custom-file-label" for="photo2">Загрузите второе фото</label>
                                        </div>
                                    </div>
                                    <div class="input-group col-xl-5 item-form-news-add">
                                        <div class="input-group-prepend clear">
                                            <span class="input-group-text" id="photo3_area" data-file="третье"></span>
                                        </div>
                                        <div class="custom-file">
                                            {{ Form::file('photo3', ['class' => 'input-default-js', 'area-describedby' => 'photo3_area', 'id' => 'photo3'])}}
                                            <label class="custom-file-label" for="photo3">Загрузите третье фото</label>
                                        </div>
                                    </div>
                                </div>

                                {{ Form::label('tags', 'Тэги') }}
                                {{Form::select('tags',['СПОРТ' => 'СПОРТ','ИСКУССТВО' => 'ИСКУССТВО','НАУКА' => 'НАУКА','ОБРАЗОВАНИЕ' => 'ОБРАЗОВАНИЕ','МЕЖДУНАРОДНЫЕ СВЯЗИ' => 'МЕЖДУНАРОДНЫЕ СВЯЗИ','ВСТРЕЧИ ВЫПУСКНИКОВ' => 'ВСТРЕЧИ ВЫПУСКНИКОВ','КОНЦЕРТЫ' => 'КОНЦЕРТЫ','ЮБИЛЕИ' => 'ЮБИЛЕИ','ПРЕЗЕНТАЦИИ' => 'ПРЕЗЕНТАЦИИ','ИЗДАНИЯ' =>'ИЗДАНИЯ' ],null,['class' => 'custom-select'])}}

                                {{ Form::submit('Сохранить',['class' => 'btn btn-primary item-form-news-add-btn'] ) }}

                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
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
@endsection
@section('script')
    <script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
    <script src="{{asset('js/news.js')}}"></script>
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
    <script>
        $(document).ready( function() {
            $('.news-form').submit( function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ url('admin/news/create') }}",
                    dataType: 'json',
                    data: new FormData($(this)[0]),
                    type: 'POST',
                    async: false,
                    cache:false,
                    contentType: false,
                    processData: false,
                    error: function(data) {
                        $('.modal-body > .container > .row').html('Новость не загружена, попробуйте снова');
                    },
                    success: function(data) {
                        $('.modal-body > .container > .row').html('Новость успешно загружена');
                        $('.modal-button').css('display','none');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready( function() {
            $('#btn-download-news-page').click(function (e) {
                e.preventDefault();
                let data = $('.item-card-news').length;
                $.ajax({
                    url: "{{ url('news/add_news') }}/" + data,
                    dataType: 'json',
                    type: 'get',
                    success: function (d) {
                        let i = 1;
                        if (d === 0) {
                            return false;
                        }
                        d.forEach(function (el) {
                            $('div[data-col=' + i + ']').append(
                                '<a href="' + el.link + '" class="item-card-news card" style="display:block;width: 100%">' +
                                '<div class="item-card-news card" style="width: 100%">' +
                                '<img class="card-img-top" src="' + el.photo + '" alt="Card image cap">' +
                                '<div class="card-body d-flex flex-column align-items-start">' +
                                '<span class="tags-news-page"><span class="tag"><i></i><span>' + el.tag + '</span></span></span>' +
                                '<span class="title-card-news">' + el.title + '</span>' +
                                '<span class="date-news-page">'+'{{ implode(' ', [date('d', strtotime($article->created_at)), \App\News::nameMonth[date('n', strtotime($article->created_at))], date('Y', strtotime($article->created_at))]) }}' +'</span>' +
                                '</div>' +
                                '</div>' +
                                '</a>'
                            );
                            i++;
                        });
                    }
                });
            });
        });
    </script>

@endsection