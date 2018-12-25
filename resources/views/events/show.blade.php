@extends('layout')
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection
@section('content')
    <div class="container" style="margin-top: 120px; padding-bottom: 100px !important">
        <div class="row">
            <div class="layout_news d-flex flex-wrap">
                <div id="photos-news" class="col-xl-6 col-lg-5 col-md-6 col-sm-12 col-12 d-flex flex-column">
                    <div class="item-img-news">
                        @foreach($eventPhotos as $photo)
                            <div class="item-img-news">
                                <img src="{{ $photo->path }}" alt="" style="width: 100%">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-start">
                    <div class="title-news">
                        <h2>{{ $event->title }}</h2>
                    </div>
                    <div class="attr">
                        <div class="date">{{ $event->date }}</div>
                        <div class="locations">{{ $event->location }}</div>
                    </div>
                    <div class="text-news">
                        {!! html_entity_decode($event->content) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection