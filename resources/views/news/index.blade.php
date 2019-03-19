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
    <script>
        const Mounth = {
            0: "Января",
            1: "Февраля",
            2: "Марта",
            3: "Апреля",
            4: "Мая",
            5: "Июня",
            6: "Июля",
            7: "Августа",
            8: "Сентября",
            9: "Октября",
            10: "Ноября",
            11: "Декабря"
        }
        function createDate(date, id) {
            let dateJs = new Date(date);
            let  result = dateJs.getDate() +' '+  Mounth[dateJs.getMonth()] +' '+ dateJs.getFullYear();
            console.log(result);
            idd = "date-" + id;
            document.getElementById(idd).innerHTML = result;
        }
    </script>
    <div class="container container-content" style="margin-top: 120px; padding-bottom: 120px">
        <div class="row d-flex flex-column">
            <div class="news-page">
                <div class="title-news-page d-flex" style="padding-left: 25px;">
                    <div class="btn-news-page d-flex flex-wrap">
                        <a  data-toggle="modal" data-target="#exampleModal" class="modal-button btn-news-page-add"><span></span><?= trans('messages.add__news') ?></a>
                        <a  data-toggle="modal" data-target="#modalRegisterForm" class="btn-news-page-sub"><span></span><?= trans('messages.news__subs__btn') ?></a>
                    </div>
                </div>
                <div id="wrapper_news">
                    <div class="news d-flex flex-wrap justify-content-start">
                        <div data-col="1" class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 d-flex flex-column flex-wrap">
                            @foreach($news as $article)
                                @if($loop->index%3 == 0 )
                                    <a href="{{ url('news/show', ['id' => $article->id]) }}"  style="display:block;width: 100%">
                                        <div class="item-card-news card" style="width: 100%">
                                            <img class="card-img-top" src="{{ $article->mainPhoto->path }}" alt="Card image cap">
                                            <div class="card-body d-flex flex-column align-items-start">
                                                <span class="tags-news-page">
                                                    <span class="tag"><i></i><span>{{ $article->getTag() }}</span></span>
                                                </span>
                                                <span class="title-card-news">{{ $article->title }}</span>
                                                <span id="date-{{$article->id}}" class="date-news-page"><script>createDate("{{$article->created_at}}", "{{$article->id}}")</script></span>
                                            </div>
                                        </div>

                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <div data-col="2" class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 d-flex flex-column flex-wrap">
                            @foreach($news as $article)
                                @if($loop->index%3 == 1 )
                                    <a href="{{url('news/show/'.$article->id)}}" style="display:block; width :100%;">
                                        <div class="item-card-news card" style="width: 100%">
                                            <img class="card-img-top" src="{{ $article->mainPhoto->path }}" alt="Card image cap">
                                            <div class="card-body d-flex flex-column align-items-start">
                                            <span class="tags-news-page">
                                                <span class="tag"><i></i><span>{{ $article->getTag() }}</span></span>
                                            </span>
                                                <span class="title-card-news">{{ $article->title }}</span>
                                                <span id="date-{{$article->id}}" class="date-news-page"><script>createDate("{{$article->created_at}}", "{{$article->id}}")</script></span>
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
                                    <a href="{{url('news/show/'.$article->id)}}" style="display:block;width: 100%">
                                        <div class="item-card-news card" style="width: 100%">
                                            <img class="card-img-top" src="{{ $article->mainPhoto->path }}" alt="Card image cap">
                                            <div class="card-body d-flex flex-column align-items-start">
                                            <span class="tags-news-page">
                                                <span class="tag"><i></i><span>{{ $article->getTag() }}</span></span>
                                            </span>
                                                <span class="title-card-news">{{ $article->title }}</span>
                                                <span id="date-{{$article->id}}" class="date-news-page"><script>createDate("{{$article->created_at}}", "{{$article->id}}")</script></span>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            @if($newsNumber > 10)
                <div class="container" style="margin-top:120px;">
                    <div class="row d-flex justify-content-center">
                        <a id="btn-download-news-page" class="btn-download-news-page"><?= trans('messages.news__more__news') ?></a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
        <div id="add-news-user" class="modal-dialog  col-xl-10" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= trans('messages.news__add__your__news') ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                {{ Form::open(array('action' => 'AdminController@createArticle', 'files' => true, 'class'=>'news-form')) }}

                                {{ Form::label('title', 'Заголовок') }}
                                {{ Form::text('title', '',['class' => 'form-control item-form-news-add','placeholder' => 'Введите заголовок новости']) }}

                                <div id="editor" class="col-12 item-form-news-add"></div>
                                <input type="hidden" name="content" id="content-news"/>

                                <div class="d-flex col-12 flex-wrap item-form-news-add justify-content-between" style="margin-top: 25px">
                                    <div class="input-group col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 item-form-news-add">
                                        <div class="input-group-prepend clear">
                                            <span class="input-group-text" id="photo_area" data-file="главное"></span>
                                        </div>
                                        <div class="custom-file">
                                            {{ Form::file('photo', ['class' => 'input-default-js', 'area-describedby' => 'photo_area', 'id' => 'photo']) }}
                                            <label class="custom-file-label" for="photo">><?= trans('messages.upload__main__photo') ?></label>
                                        </div>
                                    </div>

                                    <div class="input-group col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 item-form-news-add">
                                        <div class="input-group-prepend clear">
                                            <span class="input-group-text" id="photo1_area" data-file="первое"></span>
                                        </div>
                                        <div class="custom-file">
                                            {{ Form::file('photo1', ['class' => 'input-default-js', 'area-describedby' => 'photo1_area', 'id' => 'photo1']) }}
                                            <label class="custom-file-label" for="photo1"><?= trans('messages.news__add_photo_1') ?></label>
                                        </div>
                                    </div>
                                    <div class="input-group col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 item-form-news-add">
                                        <div class="input-group-prepend clear">
                                            <span class="input-group-text" id="photo2_area" data-file="второе"></span>
                                        </div>
                                        <div class="custom-file">
                                            {{ Form::file('photo2', ['class' => 'input-default-js', 'area-describedby' => 'photo2_area', 'id' => 'photo2']) }}
                                            <label class="custom-file-label" for="photo2"><?= trans('messages.news__add_photo_2') ?></label>
                                        </div>
                                    </div>
                                    <div class="input-group col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 item-form-news-add">
                                        <div class="input-group-prepend clear">
                                            <span class="input-group-text" id="photo3_area" data-file="третье"></span>
                                        </div>
                                        <div class="custom-file">
                                            {{ Form::file('photo3', ['class' => 'input-default-js', 'area-describedby' => 'photo3_area', 'id' => 'photo3'])}}
                                            <label class="custom-file-label" for="photo3"><?= trans('messages.news__add_photo_3') ?></label>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= trans('messages.news__close__btn') ?></button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" id="sub" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold"><?= trans('messages.sub__to__news') ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(array('action' => 'AdminController@createSubscriber', 'class'=>'subscribe-form')) }}
                <div class="modal-body mx-3 subscribes">
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input name="name" type="text" id="orangeForm-name" class="form-control validate" required>
                        <label data-error="Вы не ввели имя" data-success="Готово" for="orangeForm-name"><?= trans('messages.sub__name') ?></label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input name="email" type="email" id="sub_news-email" class="form-control validate" required>
                        <label data-error="Вы не ввели e-mail" data-success="right" for="orangeForm-email"><?= trans('messages.sub__email') ?></label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input name="course" type="number" id="sub_news-course" class="form-control">
                        <label for="sub_news-course"><?= trans('messages.sub__course') ?></label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input name="faculty" type="text" id="sub_news-faculty" class="form-control validate">
                        <label for="sub_news-faculty"><?= trans('messages.sub__faculty') ?></label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input name="work" type="text" id="sub_news-work" class="form-control validate">
                        <label for="sub_news-work"><?= trans('messages.sub__work__place') ?></label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input name="post" type="text" id="sub_news-post" class="form-control validate">
                        <label for="sub_news-post"><?= trans('messages.sub__position') ?></label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn  btn-rounded btn-primary"><?= trans('messages.sub__send__btn') ?></button>
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
                $('.modal-title').html('<h4>'+ " <?= trans('messages.sub__to__news') ?> " + '</h4>');
            });

           $('.subscribe-form').submit( function(e) {
               e.preventDefault();
               $('#sub_news-course').attr('value',  $('#sub_news-course').val() ? '' : 0);
               $('#sub_news-faculty').attr('value',  $('#sub_news-faculty').val() ? '' : 0);
               $('#sub_news-work').attr('value',  $('#sub_news-work').val() ? '' : 0);
               $('#sub_news-post').attr('value',  $('#sub_news-post').val() ? '' : 0);
               $.ajax({
                   url: " <?= App::getLocale() == 'en' ? url('admin/subscribers/en/create') : url('admin/subscribers/create') ?> ",
                   dataType: 'json',
                   data: $(this).serialize(),
                   type: 'POST',
                   error: function(data) {
                        $('.modal-title').html('<span>'+ "<?= trans('messages.err__sub__news') ?>" +'</span>');
                        $('.subscribe-form').addClass('hide');
                       document.querySelector('.subscribe-form').reset();
                   },
                   success: function(data) {
                       $('.modal-title').html('<span>'+ "<?= trans('messages.submit__sub__news') ?>" +'</span>');
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

                    url: " <?= App::getLocale() == 'en' ? url('api/news/en/create') : url('api/news/create') ?> ",
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
                console.log('---');
                let data = $('.item-card-news').length;
                let oldHeightWrapper = $('.news').outerHeight() + $('#btn-download-news-page').outerHeight();
                let newHeightWrapper = 0;
                $.ajax({
                    url: " <?= App::getLocale() == 'en' ? url('news/en/add_news') : url('news/add_news') ?>/" + data,
                    dataType: 'json',
                    type: 'get',
                    success: function (d) {
                        let i = 1;
                        if (d === 0) {
                            return false;
                        }

                        $('#wrapper_news').css({"height":oldHeightWrapper, "overflow":"hidden"});
                        d.forEach(function (el) {
                            let date = new Date(el.created_at.date);
                            console.log('---date', date.getFullYear(), date.getMonth(), date.getDay(), date.getDate());
                            $('div[data-col=' + i + ']').append(
                                '<a class="item-card-news card" href="' + el.link + '" class="" style="display:block;width: 100%; opacity:0">' +
                                '<div  style="width: 100%">' +
                                '<img class="card-img-top" src="' + el.photo + '" alt="Card image cap">' +
                                '<div class="card-body d-flex flex-column align-items-start">' +
                                '<span class="tags-news-page"><span class="tag"><i></i><span>' + el.tag + '</span></span></span>' +
                                '<span class="title-card-news">' + el.title + '</span>' +
                                    '<span class="date-news-page">'+ date.getDate() +' '+  Mounth[date.getMonth()] +' '+ date.getFullYear() +'</span>' +
                                '</div>' +
                                '</div>' +
                                '</a>'
                            );
                            i++;
                        });
                        newHeightWrapper = $('.news').height();
                        console.log(oldHeightWrapper, newHeightWrapper);
                        $('.item-card-news').animate({opacity:'1'},500);
                        $("#wrapper_news").stop().animate({height:newHeightWrapper+100},600);
                        data = $('.item-card-news').length;
                        $.ajax({
                            url: "<?= App::getLocale() == 'en' ? url('news/en/add_news') : url('news/add_news') ?>/" + data,
                            type: 'get',
                            success: function (d) {

                                if (d == 0) {
                                    $('#btn-download-news-page').css({'opacity': "0.3", "hover": ""});
                                    $('#btn-download-news-page').removeAttr('id');
                                }
                            }
                        })
                    }
                });
            });
        });
    </script>
    <script src="{{asset('js/locations.js')}}"></script>
@endsection