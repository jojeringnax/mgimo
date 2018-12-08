@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="event-page d-flex flex-column col-12">
                <div class="title-event-page d-flex">
                    <span>Мероприятия</span>
                    <button type="button" class="btn btn-raised btn-primary">Добавить мероприятие</button>
                </div>
                <div class="banner-event-page d-flex align-items-center justify-content-center">
                    <span>BANNER</span>
                </div>
                <div class="content-event-page">
                    <div class="tags-event-page">
                        @foreach($events as $event)
                        @foreach($event->getTags() as $tag)
                            <span class="tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <div class="items-event-page d-flex flex-wrap justify-content-between">
                            <div class="item">
                                <span class="title-item">
                                    {{ $event->content }}
                                </span>
                                <span class="date-item">{{ $event->date }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="js/events.js"></script>
@endsection