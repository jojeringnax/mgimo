@extends('layout')

@section('link')
@endsection
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection
@section('content')
    <div class="container" style="margin-top: 120px">
        <div class="row">
            <div class="layout_news d-flex flex-wrap">
                <div class="title-news col-12">
                    <h2>{{ $article->title }}</h2>
                </div>
                <div id="photos-news" class="col-4 d-flex flex-column">
                    <div class="item-img-news">
                        <img src="{{ $article->CoverPhoto->path }}" alt="" style="width: 100%">
                    </div>
                </div>
                <div class="col-8 d-flex flex-column align-items-center justify-content-center">
                    <div class="text-news">
                        {!! html_entity_decode($article->description) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection