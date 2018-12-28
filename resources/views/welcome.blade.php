@extends('layout')

@section('link')
    <link rel="stylesheet" href="js/OwlCarousel2/dist/assets/owl.carousel.css">
@endsection
<script>
    let nameMonth = {
        1: 'Января',
        2: 'Февраля',
        3: 'Марта',
        4: 'Апреля',
        5: 'Мая',
        6: 'Июня',
        7: 'Июля',
        8: 'Августа',
        9: 'Сентября',
        10: 'Октября',
        11: 'Ноября',
        12: 'Декабря'
    }
</script>
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
        <div class="container" style="">
            <div class="row d-flex flex-column justify-content-center">
                <div class="banner">
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="contents d-flex flex-wrap">
                <div class="item-contents news col-xl-8 col-lg-8 col-md-8 col-12">
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
                                                @foreach($article->getTags() as $tag)
                                                    <span class="">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                            {{ link_to('news/show/'.$article->id, $article->title, ['class' => '']) }}
                                            <div class="date-link d-flex justify-content-between" style="width: 100%">
                                                <span class="date-news first">{{ date('d', strtotime($article->created_at)) }}</span>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('.date-news.first').html(("{{ date('d', strtotime($article->created_at)) }}") + " " + nameMonth[("{{ date('m', strtotime($article->created_at)) }}")] + " " + ("{{ date('Y', strtotime($article->created_at)) }}"));
                                                    });
                                                </script>
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
                                                @foreach($article->getTags() as $tag)
                                                    <span class="">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                            {{ link_to('news/show/'.$article->id, $article->title, ['class' => '']) }}
                                            <div class="date-link d-flex justify-content-between" style="width: 100%">
                                                <span class="date-news second"></span>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('.date-news.second').html(("{{ date('d', strtotime($article->created_at)) }}") + " " + nameMonth[("{{ date('m', strtotime($article->created_at)) }}")] + " " + ("{{ date('Y', strtotime($article->created_at)) }}"));
                                                    });
                                                </script>
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
                                                @foreach($article->getTags() as $tag)
                                                    <span class="">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                            {{ link_to('news/show/'.$article->id, $article->title, ['class' => '']) }}
                                            <div class="date-link d-flex justify-content-between" style="width: 100%">
                                                <span class="date-news third"></span>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('.date-news.third').html(("{{ date('d', strtotime($article->created_at)) }}") + " " + nameMonth[("{{ date('m', strtotime($article->created_at)) }}")] + " " + ("{{ date('Y', strtotime($article->created_at)) }}"));
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="buttons-news">
                        <a href={{url('news')}}>Смотреть все новости <span></span></a>
                    </div>
                </div>
                <div class="item-contents events col-xl-4 col-lg-4 col-md-4 d-flex flex-column">
                    <div class="title-events">
                        <span>БЛИЖАЙШИЕ МЕРОПРИЯТИЯ </span>
                    </div>
                    <div class="bg-events">
                        @foreach($events as $event)
                            <div class="item-events">
                                <article>
                                    <span class="name-events">{{ $event->title }}</span>
                                </article>
                                <div class="d-flex flex-wrap justify-content-between">
                                    <span class="date-events col-6">
                                        <script>
                                            $(document).ready(function(){
                                                let icon = "<span class='icon-date-events'></span>";
                                                let cur_date =  nameMonth[("{{ $event->date }}").match(/\w+/g)[1]];
                                                $('.date-events').html(icon + ("{{ $event->date }}").match(/\w+/g)[2] + " " + cur_date + " " + ("{{ $event->date }}").match(/\w+/g)[0] );
                                                console.log(cur_date)
                                            })
                                        </script>
                                    </span>
                                    <span class="location col-6"><span class="icon-location-events"></span>{{ $event->location }}</span>
                                </div>
                                @if ($loop->index !== 7)
                                    <hr>
                                @endif
                            </div>
                        @endforeach
                            {{--<div class="item-events">--}}
                                {{--<article>--}}
                                    {{--<span class="name-events">Международный экономический форум «Каспийский диалог 2018»</span>--}}
                                {{--</article>--}}
                                {{--<div class="d-flex flex-wrap justify-content-between">--}}
                                    {{--<span class="date-events col-6"><span class="icon-date-events"></span>21 Декабря 2018</span>--}}
                                    {{--<span class="location col-6"><span class="icon-location-events"></span>Москва</span>--}}
                                {{--</div>--}}
                                {{--<hr>--}}
                            {{--</div>--}}
                            {{--<div class="item-events">--}}
                                {{--<article>--}}
                                    {{--<span class="name-events">Международный экономический форум «Каспийский диалог 2018»</span>--}}
                                {{--</article>--}}
                                {{--<div class="d-flex flex-wrap justify-content-between">--}}
                                    {{--<span class="date-events col-6"><span class="icon-date-events"></span>21 Декабря 2018</span>--}}
                                    {{--<span class="location col-6"><span class="icon-location-events"></span>Москва</span>--}}
                                {{--</div>--}}
                                {{--<hr>--}}
                            {{--</div>--}}
                        <div class="buttons-news" style="margin-top: 60px;">
                            <a href="{{url('events')}}" class="btn-event-page" style=" background-color: transparent">Смотреть все мероприятия <span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="media" class="container">
        <div class="row" style="margin: 0; padding: 0">
            <div class="content-media col-12">
                <div class="title-media">Сми о нас</div>
                <div class="media-news col-12 d-flex fle-wrap justify-content-between">
                    @foreach($smis as $smi)
                        <div data-smis="{{$loop->index}}" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 item-media-news d-flex">
                            <a href="{{ $smi->link }}" target="_blank">
                                <span class="source-media-news">{{ $smi->link_view }}</span>
                                <span class="title-media-news">{{ $smi->title }}</span>
                                <span class="date-media-news">10 Ноября 2018</span>
                            </a>
                            @if (($loop->index + 1)%4) <hr> @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="btn-media">
                <a href="{{url('smis')}}" target="_blank">Смотреть все новости СМИ<span></span></a>
            </div>
            <hr class="section-hr">
        </div>
    </div>
    <div id="congratulations" class="container">
        <div class="row" style="margin:0; padding: 0">
            <div class="content-congratulations col-12" style="padding: 0">
                <div class="title-congratulations">
                    <span>Поздравления</span>
                </div>
                <div class="d-flex flex-wrap justify-content-between">
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
                    <a href="{{url('congratulations')}}" class="btn-watch-congr">Смотреть все поздравления <span class="congr_watch"></span></a>
                    <a href=""data-toggle="modal" data-target="#congratulationModule" class="btn-congr"><span class="congr_icon"></span>Поздравить МГИМО</a>
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
                        <a href="{{url('gallery')}}" class="">Смотреть фото <span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="content-partners" style="width: 100%">
                <div class="title-partners">
                    <span>Партнеры</span>
                </div>
                @if(count($partners) > 3)
                    <div data-arrow = "right" class="arrow next"></div>
                    <div data-arrow = "left" class="arrow prev"></div>
                    <div class="d-flex justify-content-center">
                            <div class="partners owl-carousel owl-theme col-xl-10 col-lg-8 col-md-6 col-6 justify-content-center">
                                <div class="item">
                        @else
                            <div class="prtn" style="display: flex;justify-content: space-around;align-items: center;flex-direction: row;">
                        @endif
                                @foreach($partners as $partner)
                                    @if($loop->count <= 3)
                                        <div class="item" style="width: 200px;height: 50px">
                                            <div class="item-partner">
                                                <a href="{{ $partner->link }}"><img src="{{ $partner->photo !== null ? $partner->photo->path : 'img/no-image.png'}}" alt="" /></a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="item-partner">
                                            <a href="{{ $partner->link }}"><img src="{{ $partner->photo !== null ? $partner->photo->path : 'img/no-image.png'}}" alt="" /></a>
                                        </div>
                                        @if($loop->iteration%2 === 0 && $loop->index !== 0 && !$loop->last)
                                            </div><div class="item">
                                        @endif
                                        @if($loop->last)
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            @if(count($partners) > 3)
                            </div>
                        @else
                            </div>
                        @endif
                        </div>
                    </div>
            <a href="{{url('partners')}}" class="btn-partners">Смотреть всех партнеров <span></span></a>
        </div>
    </div>
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
                                {{Form::open(array('action' => 'AdminController@createCongratulation', 'files' => true, 'class' => 'congratulation_ajax')) }}
                                <div class="item-form-congratulation">
                                    {{ Form::label('title', 'Заголовок') }}
                                    {{ Form::text('title', '',['class' => 'form-control']) }}
                                </div>
                                <div class="item-form-congratulation">
                                    {{ Form::label('content', 'Текст поздравления') }}
                                    {{ Form::textarea('content',    '',['class' => 'form-control']) }}
                                </div>
                                <div class="item-form-congratulation">
                                    {{ Form::label('date', 'Выберите дату') }}
                                    {{  Form::select('date', \App\Congratulation::getDatesArray(),  null, ['class' => 'form-control' ]) }}
                                </div>
                                <div class="item-form-congratulation input-group col-xl-6 item-form-news-add">
                                    <div class="input-group-prepend clear">
                                        <span class="input-group-text" id="photo_area" data-file="второе">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        {{ Form::file('file', ['class' => 'form-control','area-describedby' => 'photo_area','id' => 'photo-main'])}}
                                        <label class="custom-file-label" for="photo-main">Загрузите основное фото</label>
                                    </div>
                                </div>
                                <div class="item-form-congratulation input-group col-xl-6 item-form-news-add">
                                    <div class="input-group-prepend clear">
                                        <span class="input-group-text" id="photo2_area" data-file="второе">Upload</span>
                                    </div>
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
@endsection