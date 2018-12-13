@extends('layout')

@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="row d-flex flex-column">
            <div class="news-page">
                <div class="title-news-page d-flex">
                    <span class="text-title-news-page">Новости</span>
                    <div class="btn-news-page d-flex">
                        <button type="button" class="btn-news-page-add"><span></span>Добавить свою новость</button>
                        <button type="button" class="btn-news-page-sub"><span></span>Подписаться на новости</button>
                    </div>
                </div>
                <div class="news d-flex flex-wrap justify-content-between">
                    @foreach($news as $article)
                        <div class="item-card-news card">
                            <img class="card-img-top" src="{{ $article->mainPhoto->path }}" alt="Card image cap">
                            <div class="card-body">
                                <span class="title-card-news">{{ $article->title }}</span>
                                <p class="card-text">{!!html_entity_decode($article->content)!!}</p>
                            </div>
                            {{ link_to('news/show/'.$article->id, 'Читать', ['class' => 'card-link']) }}
                        </div>
                    @endforeach
                    <button id="btn-download-news" type="button" class="btn btn-raised btn-primary">Посмотреть еще новости</button>
                </div>
            </div>
            </div>

    </div>
@endsection
@section('script')
    <script src="{{ asset('js/news.js') }}"></script>
@endsection