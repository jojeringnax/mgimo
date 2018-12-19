@extends('layout')
@section('content')
    <div class="container" style="margin-top: 100px; padding-bottom: 100px !important;">
        <div class="row">
            <div class="event-page d-flex flex-column col-12">
                <div class="title-event-page d-flex">
                    <span>Мероприятия</span>
                    <a type="button" class="button-event-page">Добавить мероприятие</a>
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
                                <span style="width: 35%; padding-left: 5px;">24 мая 2019 г.</span>
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
                                <div class="item">
                                    <span class="title-item">
                                        {{ $event->content }}
                                    </span>
                                    <span class="date-item"><i></i>{{ $event->date }}</span>
                                    <span class="location-item"><i></i>{{ $event->location }}</span>
                                </div>
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