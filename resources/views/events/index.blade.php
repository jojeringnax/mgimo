@extends('layout')
@section('content')
    <div class="container" style="margin-top: 100px; padding-bottom: 100px;">
        <div class="row">
            <div class="event-page d-flex flex-column col-12">
                <div class="title-event-page d-flex">
                    <span>Мероприятия</span>
                    <button type="button" class="btn btn-raised btn-primary">Добавить мероприятие</button>
                </div>
                <div class="banner-event-page d-flex align-items-center justify-content-center">
                    <span>BANNER</span>
                </div>
                <div class="content-event-page d-flex flex-wrap">
                    @foreach($events as $event)
                        <div class="d-flex col-xl-4" style="padding: 10px;">
                            <div class="items-event-page d-flex flex-wrap flex-column justify-content-around col-xl-12">
                                <div class="tags-event-page">
                                    @foreach($event->getTags() as $tag)
                                        <span class="tag">{{ $tag }}</span>
                                    @endforeach
                                </div>
                                <div class="item">
                                    <span class="title-item">
                                        {{ $event->content }}
                                    </span>
                                    <span class="date-item">{{ $event->date }}</span>
                                    <span class="location-item">{{ $event->location }}</span>
                                </div>
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