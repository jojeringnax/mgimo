@extends('layout')

@section('link')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="layout_news d-flex flex-wrap">
                <div class="title-news col-12">
                    <span>{{ $article->title }}</span>
                </div>
                <div id="photos-news" class="col-4 d-flex flex-column">
                    @foreach($article->getPhotos() as $photo)
                        <div class="item-img-news">
                            <img src="{{ $photo->path }}" alt="" style="width: 100%">
                        </div>
                    @endforeach
                </div>
                <div class="col-8 d-flex flex-column align-items-center justify-content-center">
                    <div class="text-news">
                        {{ $article->content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection