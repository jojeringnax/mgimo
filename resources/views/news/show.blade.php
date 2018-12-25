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
                        <img src="{{ $article->mainPhoto->path }}" alt="" style="width: 100%">
                    </div>
                    @foreach($articlePhotos as $photo)
                        <div class="item-img-news">
                            <img src="{{ $photo->path }}" alt="" style="width: 100%">
                        </div>
                    @endforeach
                </div>
                <div class="col-xl-6 col-lg-7 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-start">
                    <div class="title-news">
                        <h2>{{ $article->title }}</h2>
                    </div>
                    <div class="text-news">
                        {!! html_entity_decode($article->content) !!}
                    </div>
                    <div id="vk-share"></div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/soc-net/sharer.min.js')}}"></script>
    <script type="text/javascript" src="https://vk.com/js/api/share.js?95" charset="windows-1251"></script>
    <script>
        $(document).ready(function(){
            $('#vk-share').html('<button class="button btn-soc-net" data-sharer="vk" data-caption="Sharer.js is the ultimate sharer js lib" data-title="{{ $article->title }}" data-url="'+ window.location.href +'"><div id="vk"></div></button>');
            $('#vk-share').append('<button class="button btn-soc-net" data-title="{{ $article->title }}" data-sharer="facebook" data-hashtag="hashtag" data-url="'+ window.location.href +'"><div id="fb"></div></button>');
            window.Sharer.init();
        })
    </script>
@endsection()