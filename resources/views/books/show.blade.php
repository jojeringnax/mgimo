@extends('layout')

@section('link')
@endsection
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection
@section('color')
    background-color: white !important;
@endsection
@section('content')
    <div class="container container-content" style="margin-top: 120px; padding-bottom: 120px;">
        <div class="row">
            <div class="layout_news d-flex flex-wrap">
                <div id="photos-news" class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12 d-flex flex-column">
                    <div class="item-img-news" style="text-align: center">
                        <img src="{{ $article->CoverPhoto->path }}" alt="" style="width: 55%;">
                    </div>
                    <div class="link-book-pay-pages">
                        @if($article->status == 0)
                            <a class="btn-bad" style="opacity: 0.4">Ожидается</a>
                        @else
                            <a class="btn-good" href="{{$article->link}}" style="text-align: center" target="_blank">Подробнее</a>
                        @endif

                    </div>
                </div>
                <div class="description-book col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12 d-flex flex-column align-items-start justify-content-start">
                    <div class="title-news">
                        <h2>{{ $article->title }}</h2>
                    </div>
                    <div class="text-news">
                        {!! html_entity_decode($article->description) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/locations.js')}}"></script>
@endsection