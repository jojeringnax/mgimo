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
    <div class="container container-content" style="margin-top: 120px; padding-bottom: 100px">
        <div class="row">
            <div class="event-page d-flex flex-column col-12">
                <div class="title-event-page d-flex flex-row align-items-center">
                    {{--<span>Мероприятия</span>--}}
                    <a href="{{ \App\Event::getMainFilePhotoModel() == null ? '#' : \App\Event::getMainFilePhotoModel()->path}}" class="modal-button button-event-page btn-linkk" style="margin-left: 58px;" download><span class="text-btn">Скачать график мероприятий</span><span class="arrow-btn"></span></a>
                </div>
                <div class="banner-event-page d-flex flex-wrap">
                    <div class="layout-banner-event-page">
                        <a id="link_tashkent" href="http://alumniforum.mgimo.ru/" target="_blank" style="top: 31%; left: 368px; position: absolute">Подробнее</a>
                    </div>
                    <div class="mob-event">
                        <div class="item-event-mob">
                            <div class="palka"></div>
                            <div class="data">
                                <div class="date">20 – 21 апреля 2019 г.</div>
                                <div class="text">Универсиада МГИМО. «Спортивные поколения» </div>
                            </div>
                        </div>
                        <div class="item-event-mob">
                            <div class="palka"></div>
                            <div class="data">
                                <div class="date">17 – 19 мая 2019 г.</div>
                                <div class="text">Международный форум выпускников МГИМО в Ташкенте</div>
                                <a href="http://alumniforum.mgimo.ru/" target="_blank" class="link">Подробнее</a>
                            </div>
                        </div>
                        <div class="item-event-mob">
                            <div class="palka"></div>
                            <div class="data">
                                <div class="date">25 мая 2019 г.</div>
                                <div class="text">Кубок Ректора МГИМО по гольфу к 75-летию МГИМО</div>
                                {{--<div class="link">Подробнее</div>--}}
                            </div>
                        </div>
                        <div class="item-event-mob">
                            <div class="palka"></div>
                            <div class="data">
                                <div class="date">7-25 октября 2019 г.</div>
                                <div class="text">Арт-выставка выпускников МГИМО. «О МГИМО и о Москве»</div>
                                {{--<div class="link">Подробнее</div>--}}
                            </div>
                        </div>
                        <div class="item-event-mob">
                            <div class="palka"></div>
                            <div class="data">
                                <div class="date">Июнь 2019 г.</div>
                                <div class="text">«Возвращаемся к Крымскому мосту». Молодежный вечер МГИМО в Парке Горького и Фестиваль живой музыки в Зеленом театре Парка</div>
                                {{--<div class="link">Подробнее</div>--}}
                            </div>
                        </div>
                        <div class="item-event-mob">
                            <div class="palka"></div>
                            <div class="data">
                                <div class="date">21-22 октября 2019 г.</div>
                                <div class="text">XII Конвент РАМИ  «Мир регионов VS. Регионы мира»</div>
                                {{--<div class="link">Подробнее</div>--}}
                            </div>
                        </div>
                        <div class="item-event-mob">
                            <div class="palka last"></div>
                            <div class="data">
                                <div class="date">23 октября 2019 г..</div>
                                <div class="text">Торжественный юбилейный вечер</div>
                                {{--<div class="link">Подробнее</div>--}}
                            </div>
                        </div>
                    </div>

                </div>
                <div id="town-filter" class="select-container">
                    <span class="select-arrow"></span>
                    <select id="select-location">
                        @foreach($locations as $location)
                            <option value="{{$location}}">{{$location}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="events_wrapper" class="content-event-page d-flex flex-wrap">
                    @foreach($events as $event)
                        <div class="d-flex col-xl-4 col-lg-4 col-ms-4 col-sm-6 col-12" style="padding: 10px;">
                            <div class="items-event-page d-flex flex-wrap flex-column justify-content-around col-12">
                                <a href="{{url('events/show/'.$event->id)}}">
                                    <div class="item">
                                        <span class="title-item">{{ $event->title }}</span>
                                        <span class="date-item"><i></i>{{ $event->getDatesAsString() }}</span>
                                        <span class="location-item"><i></i>{{ $event->location }}</span>
                                    </div>
                                </a>
                                @if($loop->index%3 !== 2)
                                    <hr >
                                @else
                                    <hr class="event-page-none-hr">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if($eventsNumber > 12)
                <div class="d-flex justify-content-center" style="width: 100%; margin-top: 60px;"><a id="btn-download-event-page" href="" class=""><?= trans('messages.events__more__events') ?></a></div>
            @endif
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
    <script src="{{asset('js/event-page.js')}}"></script>
    <script>
        $(document).ready( function() {
            $('.event-form').submit( function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?= App::getLocale() == 'en' ? url('admin/events/en/create') :url('admin/events/create') ?>",
                    dataType: 'json',
                    data: new FormData($(this)[0]),
                    type: 'POST',
                    async: false,
                    cache:false,
                    contentType: false,
                    processData: false,
                    error: function(data) {
                        $('.modal-body > .container > .row').html('Мероприятие не загружено, попробуйте снова');
                    },
                    success: function(data) {
                        $('.modal-body > .container > .row').html('Мероприятие успешно загружено');
                        $('.modal-button').css('display','none');
                    }
                });
            });
            $('#select-location').change(function(){
               $.ajax({
                   url: '<?= App::getLocale() == 'en' ? url('events/en/get_by_location/') : url('events/get_by_location/') ?>' + '/' + $(this).val(),
                   dataType: 'json',
                   success: function (response) {
                       console.log(response);
                       let events = '';
                       let hr = '';
                       response.forEach(function(el, index, arr){
                           if(index%3 !== 2) {
                               if(index === arr.length-1) {
                                   hr = '';
                               } else {
                                   hr = '<hr/>';
                               }
                           } else {
                               hr = '';
                           }
                           events +=
                               '<div class="d-flex col-xl-4 col-lg-4 col-ms-4 col-sm-6 col-12" style="padding: 10px;">' +
                                   '<div class="items-event-page d-flex flex-wrap flex-column justify-content-around col-xl-12">' +
                                        '<a class="" href="{{url('events/show')}}' +'/'+el.id + '">' +
                                            '<div class="item">' +
                                                '<span class="title-item">'+el.title+'</span>'+
                                                '<span class="date-item"><i></i>'+el.date+'</span>' +
                                                '<span class="location-item"><i></i>'+el.location+'</span>' +
                                            '</div>' +
                                        '</a>' +
                                        hr+
                                    '</div>' +
                               '</div>';

                       });
                       $('#events_wrapper').html(events);
                   },
                   error: function(response) {
                       console.log(response);
                   }
               })
            });
        });
    </script>
    <script>
        $(document).ready( function() {
            $('#btn-download-event-page').click( function(e) {
                e.preventDefault();
                let data = $('.items-event-page > a').length;
                $.ajax({
                    url: " <?= App::getLocale() == 'en' ? url('events/en/add_events') :url('events/add_events') ?>/" + data,
                    dataType: 'json',
                    type: 'get',
                    success: function(d) {
                        let i = 0;
                        let div = $('#events_wrapper');
                        let text;
                        if(d !== 0) {
                            d.forEach(function (el) {
                                text =
                                    '<div class="d-flex col-xl-4" style="padding: 10px;">' +
                                    '<div class="items-event-page d-flex flex-wrap flex-column justify-content-around col-xl-12">' +
                                    '<a href="' + el.link + '">' +
                                    '<div class="item">' +
                                    '<span class="title-item">' + el.title + '</span>' +
                                    '<span class="date-item">' + el.date + '</span>' +
                                    '<span class="location-item"><i></i>' + el.location + '</span>' +
                                    '</div>' +
                                    '</a>';
                                if (i % 3 !== 2 && i !== d.length-1) {
                                    text += '<hr>';
                                }
                                text += '</div></div>';
                                div.append(text);
                                i++;
                            });
                        }
                    }
                });
            });


        });
    </script>
    <script src="{{asset('js/locations.js')}}"></script>
@endsection