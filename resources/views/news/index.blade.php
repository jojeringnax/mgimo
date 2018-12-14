@extends('layout')

@section('content')
    <div class="container" style="margin-top: 100px; padding-bottom: 120px">
        <div class="row d-flex flex-column">
            <div class="news-page">
                <div class="title-news-page d-flex">
                    <span class="text-title-news-page">Новости</span>
                    <div class="btn-news-page d-flex">
                        <a  class="btn-news-page-add"><span></span>Добавить свою новость</a>
                        <a  class="btn-news-page-sub"><span></span>Подписаться на новости</a>
                    </div>
                </div>
                <div class="news d-flex flex-wrap justify-content-between">
                    @foreach($news as $article)
                        <div class="item-card-news card">
                            <img class="card-img-top" src="{{ $article->mainPhoto->path }}" alt="Card image cap">
                            <div class="card-body">
                                <span class="title-card-news">{{ $article->title }}</span>
                                <p class="card-text">{!! mb_strimwidth(strip_tags($article->content), 0, 200, '...')!!}</p>
                            </div>
                            {{ link_to('news/show/'.$article->id, 'Читать', ['class' => 'card-link news-show-link']) }}
                        </div>
                    @endforeach
                </div>
                <div class="container" style="margin-top:120px;">
                    <div class="row d-flex justify-content-center">
                        <a id="btn-download-news-page" class="">Показать еще новости</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/news.js') }}"></script>
@endsection