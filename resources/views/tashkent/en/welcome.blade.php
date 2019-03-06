@extends('layout')

@section('link')
    <link rel="stylesheet" href="js/OwlCarousel2/dist/assets/owl.carousel.css">
@endsection


@section('content')

    <div class="layout-img hide">
        <div class="layout">

        </div>
        <div class="img-source-layout">
            <img src="" alt="">
        </div>
    </div>
    <div class="banner-header" style="background-color: #F2FBFF;">
        <div class="time">
            <div class="logo">
                <img src="img/icon/logo.svg" alt="">
                <hr />
            </div>
            <div class="timerr">
                <span class="title-timer">До юбилея осталось:</span>
                <div class="timer-lay">
                    <div id="timer" class="timer d-flex justify-content-center"></div>
                </div>
            </div>

        </div>
        <div class="container button-logo" style="">
            <div class="row d-flex flex-column justify-content-center">
                <div class="banner">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSezXMVdZ__pKNosXVuey-RsX9EL6GiBXsH85H24FrvhTSlzOw/viewform" id="btn-participant">заявка на участие</a>
                    <div class="logo-main-page d-flex justify-content-center align-items-center">
                        <a target="_blank" href="https://alumni.mgimo.ru">
                            <img src="img/logo1.svg" alt="" style="">
                        </a>
                        <a class="hidden-logo" target="_blank" href="http://fund.mgimo.ru/" style="display: none">
                            <img src="img/logo3.svg" alt="" style="margin-right: 0 !important">
                        </a>
                        <a  target="_blank" href="https://mgimo.ru/">
                            <img id="mgimo" src="img/logo2.svg" alt="" style="">
                        </a>
                        <a class="show-logo" target="_blank" href="http://fund.mgimo.ru/">
                            <img src="img/logo3.svg" alt="" style="margin-right: 0">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container" id="news-events">
        <div class="row">
            <div class="contents d-flex flex-wrap">
                <div class="item-contents news col-xl-8 col-lg-8 col-md-12 col-12">
                    <div class="title-news">
                        <span>НОВОСТИ</span>
                    </div>

                    @foreach($news as $article)
                        @if($loop->index == 0)
                            <div class="small-news">
                                <div id="0" class="small-new col-12">
                                    <article class="d-flex flex-wrap">
                                        <div class="img-small-new">
                                            <img src="{{ $article->mainPhoto->path }}" alt="">
                                        </div>
                                        <div class="content-small-new">
                                            <div class="tag">
                                                <i></i>
                                                <span class="">{{ $article->getTag() }}</span>
                                            </div>
                                            {{ link_to('news/show/'.$article->id, $article->title, ['class' => '']) }}
                                            <div class="date-link d-flex justify-content-between" style="width: 100%">
                                                <span class="date-news first">{{ implode(' ', [date('d', strtotime($article->created_at)), \App\News::nameMonth[date('n', strtotime($article->created_at))], date('Y', strtotime($article->created_at))]) }}</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @elseif($loop->index == 1)
                                <div id="1" class="small-new col-12">
                                    <article class="d-flex flex-wrap">
                                        <div class="img-small-new">
                                            <img src="{{ $article->mainPhoto->path }}" alt="">
                                        </div>
                                        <div class="content-small-new">
                                            <div class="tag">
                                                <i></i>
                                                <span class="">{{ $article->getTag() }}</span>
                                            </div>
                                            {{ link_to('news/show/'.$article->id, $article->title, ['class' => '']) }}
                                            <div class="date-link d-flex justify-content-between" style="width: 100%">
                                                <span class="date-news second">{{ implode(' ', [date('d', strtotime($article->created_at)), \App\News::nameMonth[date('n', strtotime($article->created_at))], date('Y', strtotime($article->created_at))]) }}</span>

                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @elseif($loop->index == 2)
                                <div id="2" class="small-new col-12">
                                    <article class="d-flex flex-wrap">
                                        <div class="img-small-new">
                                            <img src="{{ $article->mainPhoto->path }}" alt="">
                                        </div>
                                        <div class="content-small-new">
                                            <div class="tag">
                                                <i></i>
                                                <span class="">{{ $article->getTag() }}</span>
                                            </div>
                                            {{ link_to('news/show/'.$article->id, $article->title, ['class' => '']) }}
                                            <div class="date-link d-flex justify-content-between" style="width: 100%">
                                                <span class="date-news third">{{ implode(' ', [date('d', strtotime($article->created_at)), \App\News::nameMonth[date('n', strtotime($article->created_at))], date('Y', strtotime($article->created_at))]) }}</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="buttons-news">
                        <a class="btn-linkk  btn-mgimo" href={{url('news')}}><span class="text-btn">Смотреть все новости </span><span class="arrow-btn"></span></a>
                    </div>
                </div>
                <div class="item-contents events col-xl-4 col-lg-4 col-md-12 d-flex flex-column">
                    <div class="title-events">
                        <span>БЛИЖАЙШИЕ МЕРОПРИЯТИЯ </span>
                    </div>
                    <div class="bg-events">
                        @foreach($events as $event)
                            <div class="item-events col-lg-12 col-md-6 col-sm-6 col-12">
                                <a href="{{url('events/show/'.$event->id)}}">
                                    <article>
                                        <span class="name-events">{{ $event->title }}</span>
                                    </article>
                                    <div class="d-flex flex-wrap justify-content-between">
                                    <span class="date-events col-7"><span class='icon-date-events'></span>
                                        {{ $event->getDatesAsString() }}
                                    </span>
                                        <span class="location col-5"><span class="icon-location-events"></span>{{ $event->location }}</span>
                                    </div>
                                    @if ($loop->index !== 7)
                                        <hr>
                                    @endif
                                </a>
                            </div>
                        @endforeach
                        <div id="btn-event" class="buttons-news" style="margin-top: 60px;">
                            <a href="{{url('events')}}" class="btn-event-page btn-linkk  btn-mgimo" style=" background-color: transparent"><span class="text-btn">Смотреть все мероприятия</span><span class="arrow-btn"></span></a>
                        </div>
                    </div>
                </div>
                <hr class="section-hr">
            </div>
        </div>
    </div>

    <div id="congratulationss" class="container">
        <div class="row" style="margin:0; padding: 0">
            <div class="content-congratulations col-12" style="padding: 0">
                <div class="title-congratulations">
                    <span>Поздравления</span>
                </div>
                <div class="items-congr d-flex flex-wrap justify-content-between">
                    @foreach ($congratulations as $congratulation)
                    <div class="item-congratulations">
                        @if(!preg_match('/<iframe*/', $congratulation->content))
                            <img class="img-item-congratulations img-thumbnail" src="{{ $congratulation->mainPhoto !== null ? $congratulation->mainPhoto->path : url('img/no-image.png') }}" alt="" />
                        @else
                            <div class="img-item-congratulations">{!! html_entity_decode($congratulation->content) !!}</div>
                        @endif
                        <div class="content-item-congratulations">
                            <span class="title-item-congratulations">{{ $congratulation->title }}<br></span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="btns-congratulations d-flex justify-content-xl-start justify-content-sm-center">
                    <a href="{{url('congratulations')}}" class="btn-watch-congr btn-linkk btn-mgimo"><span class="text-btn">Смотреть все поздравления</span><span class="congr_watch arrow-btn"></span></a>
                    <a href="" data-toggle="modal" data-target="#congratulationModule" class="btn-congr btn-mgimo"><span class="congr_icon"></span>Поздравить МГИМО</a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gallery">
        <div class="container">
            <div class="row">
                <div class="gallery-content d-flex ">
                    <div class="big-photo col-xl-8 col-lg-6 col-md-12"><img src="img/new_test/collage.png" alt=""></div>
                    <div class="text-gallery col-xl-4 col-lg-6 col-md-12">
                        <span class="title-text-gallery ">Мы собрали самые яркие воспоминания из жизни МГИМО</span>
                        <a class="btn-linkk-photo btn-mgimo" href="{{url('gallery')}}" ><span class="text-btn">Смотреть фото </span><span class="arrow-btn"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="content-partners" style="width: 100%">
                <div class="title-partners">
                    <span>Партнеры и спонсоры</span>
                </div>
                @if(count($partners) > 3)
                    <div data-arrow = "right" class="arrow next"></div>
                    <div data-arrow = "left" class="arrow prev"></div>
                    <div class="d-flex justify-content-center">
                        <div class="partners owl-carousel owl-theme col-xl-10 col-lg-8 col-md-6 col-6 justify-content-center" >
                            <div class="item">
                                @foreach($partners as $partner)
                                    <div class="item-partner">
                                        <a href="{{ $partner->link }}">
                                            <div style="height: 100%">
                                                <img src="{{ $partner->photo !== null ? $partner->photo->path : 'img/no-image.png'}}" alt="" />
                                            </div>
                                        </a>
                                    </div>
                                    @if($loop->iteration%3 == 0 && $loop->index !== 0 && !$loop->last)
                                        </div><div class="item">
                                    @endif
                                    @if($loop->last)
                                        </div>
                                    @endif
                                @endforeach
                            @if(count($partners) > 3)
                            </div>
                        @else
                            </div>
                        @endif
                        </div>
                @else
                    <div class="prtn" style="display: flex;justify-content: space-around;align-items: center;flex-direction: row;">
                @endif
                    </div>
            <a href="{{url('partners')}}" class="btn-partners btn-linkk  btn-mgimo"><span class="text-btn">Смотреть всех партнеров</span><span class="arrow-btn"></span></a>
        </div>
    </div>
    <section id="media">
        <div class="container container-content">
            <div class="row" style="margin: 0; padding: 0">
                <div class="content-media col-12">
                    <div class="title-media">Сми о юбилее МГИМО</div>
                    <div class="media-news col-12 d-flex fle-wrap justify-content-between">
                        @foreach($smis as $smi)
                            <div data-smis="{{$loop->index}}" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 item-media-news d-flex">
                                <a href="{{ $smi->link }}" target="_blank">
                                    <span class="source-media-news">{{ $smi->link_view }}</span>
                                    <span class="title-media-news">{{ $smi->title }}</span>
                                    <span class="date-media-news">{{ implode(' ', [date('d', strtotime($smi->created_at)), \App\News::nameMonth[date('n', strtotime($smi->created_at))], date('Y', strtotime($smi->created_at))]) }}</span>
                                </a>
                                @if (($loop->index + 1)%4) <hr> @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="btn-media">
                    <a class="btn-linkk btn-mgimo" href="{{url('smis')}}" target="_blank"><span class="text-btn">Смотреть все новости СМИ</span><span class="arrow-btn"></span></a>
                </div>
            </div>
        </div>
    </section>
    <div class="modal" tabindex="-1" role="dialog" id="congratulationModule">
        <div class="modal-dialog" role="document" style="max-width: 80%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Заполните форму поздравления</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-8 d-flex flex-column" style="height:100%">
                                {{Form::open(array('files' => true, 'class' => 'congratulation_ajax')) }}
                                <div class="item-form-congratulation">
                                    {{ Form::label('title', 'Заголовок') }}
                                    {{ Form::text('title','',['class' => 'form-control']) }}
                                </div>
                                <div class="item-form-congratulation">
                                    {{ Form::label('content', 'Сыылка на видео') }}
                                    {{ Form::text('content','',['class' => 'form-control item-form-news-add link-video','placeholder' => 'Если вы хотите загрузить видео, ты ссылку вставьте сюда.']) }}
                                </div>

                                {{  Form::hidden('date','1',  null, ['class' => 'form-control' ]) }}
                                {{ Form::hidden('priority', '5',['class' => 'form-control item-form-news-add']) }}
                                <div class="item-form-congratulation input-group col-xl-6 item-form-news-add">
                                    <div class="custom-file">
                                        {{ Form::file('file', ['class' => 'form-control','area-describedby' => 'photo_area','id' => 'photo-main'])}}
                                        <label class="custom-file-label" for="photo-main">Загрузите основное фото</label>
                                    </div>
                                </div>
                                <div class="item-form-congratulation input-group col-xl-6 item-form-news-add">
                                    <div class="custom-file">
                                        {{ Form::file('photos[]', ['class' => 'form-control','area-describedby' => 'photo2_area','id' => 'photo', 'multiple' => 'multiple'])}}
                                        <label class="custom-file-label" for="photo">Загрузите фото или видео</label>
                                    </div>
                                </div>
                                {{ Form::submit('Сохранить', ['class' => 'btn btn-raised btn-primary']) }}
                            </div>
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/congratulation_form.js')}}"></script>
    <script src="{{asset('js/OwlCarousel2/dist/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/locations.js')}}"></script>
@endsection