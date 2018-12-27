@extends('layout')
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
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
    <div class="container" style="margin-top: 100px; padding-bottom: 100px !important;">
        <div class="row">
            <div class="event-page d-flex flex-column col-12">
                <div class="title-event-page d-flex flex-row align-items-center">
                    {{--<span>Мероприятия</span>--}}
                    <a class="button-event-page" style="margin-left: 58px;">Добавить мероприятие<span></span></a>
                </div>
                <div class="banner-event-page d-flex flex-wrap">
                    <div class="layout-banner-event-page">

                    </div>
                    <div class="d-flex" style="margin-top: 56px;">
                        <div class="col-xl-4 item-banner-event-page">
                            <div class="title-event-page-banner">
                                <span class="icon-event-page"></span>
                                <span>Март 2019 г.</span>
                            </div>
                            <div class="content">
                                Универсиада МГИМО.
                                «Спортивные
                                поколения»
                            </div>
                        </div>
                        <div class="col-xl-4 item-banner-event-page">
                            <div class="title-event-page-banner">
                                <span class="icon-event-page"></span>
                                <span style="width: 50%">12 – 14 апреля 2019 г.</span>
                            </div>
                            <div class="content">
                                Международный форум
                                выпускников МГИМО
                                в Ташкенте
                            </div>
                        </div>
                        <div class="col-xl-4 item-banner-event-page">
                            <div class="title-event-page-banner">
                                <span class="icon-event-page"></span>
                                <span style="width: 35%; padding-left: 10px;">24 мая 2019 г.</span>
                            </div>
                            <div class="content">
                                Кубок Ректора МГИМО
                                по гольфу к 75-летию
                                МГИМО
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-6 item-banner-event-page">
                            <div class="title-event-page-banner">
                                <span class="icon-event-page"></span>
                                <span>Октябрь 2019 г.</span>
                            </div>
                            <div class="content">
                                XII Конвент РАМИ<br>
                                «Мир регионов VS.<br> Регионы мира»
                            </div>
                        </div>
                        <div class="col-xl-6 five item-banner-event-page">
                            <div class="title-event-page-banner">
                                <span class="icon-event-page"></span>
                                <span>Октябрь 2019 г.</span>
                            </div>
                            <div class="content">
                                «Возвращаемся к Крымскому мосту». Молодежный вечер МГИМО в Парке Горького и Фестиваль живой музыки в Зеленом театре Парка
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-xl-5 last item-banner-event-page">
                            <div class="title-event-page-banner">
                                <span class="icon-event-page"></span>
                                <span>Октябрь 2019 г.</span>
                            </div>
                            <div class="content">
                                Арт-выставка выпускников МГИМО. «О МГИМО и о Москве»
                            </div>
                        </div>
                        <div class="col-xl-5 last item-banner-event-page">
                            <div class="title-event-page-banner">
                                <span class="icon-event-page"></span>
                                <span>Октябрь 2019 г.</span>
                            </div>
                            <div class="content">
                                Торжественный вечер
                                в Большом театре
                            </div>
                        </div>
                    </div>

                </div>
                <div class="content-event-page d-flex flex-wrap">
                    @foreach($events as $event)
                        <div class="d-flex col-xl-4" style="padding: 10px;">
                            <div class="items-event-page d-flex flex-wrap flex-column justify-content-around col-xl-12">
                                {{--<div class="tags-event-page">--}}
                                    {{--@foreach($event->getTags() as $tag)--}}
                                        {{--<span class="tag">{{ $tag }}</span>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                                <a href="{{url('events/show/'.$event->id)}}">
                                    <div class="item">
                                        <span class="title-item">
                                            {{ $event->title }}
                                        </span>
                                        <span class="date-item"></span>
                                        <script>
                                            $(document).ready(function(){
                                                $('.date-item').html("<i></i>" + ("{{ date('d', strtotime($event->date)) }}") + " " + nameMonth[("{{ date('m', strtotime($event->date)) }}")] + " " + ("{{ date('Y', strtotime($event->date)) }}"));
                                            });
                                        </script>
                                        <span class="location-item"><i></i>{{ $event->location }}</span>
                                    </div>
                                </a>
                                @if($loop->index%3 !== 2)
                                    <hr>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="js/events.js"></script>
@endsection