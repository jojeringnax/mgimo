@extends('layout')

@section('content')
    <div class="container">
        <div class="row d-flex flex-column">
            <div class="title-news d-flex">
                <span class="text-title-news">Новости</span>
                <div class="btn-news">
                    <button type="button" class="btn btn-raised btn-success">Добавить свою новость</button>
                    <button type="button" class="btn btn-raised btn-primary">Подписаться на новости</button>
                </div>
            </div>
            <div class="news d-flex flex-wrap justify-content-between">
                <?php for ($i=0;$i<=7;$i++) { ?>
                    <div class="item-card-news card">
                        <img class="card-img-top" src="https://otakukart.com/wp-content/uploads/2017/08/one_piece_movie_z_luffy_by_exalmas-d61qk9b.png" alt="Card image cap">
                        <div class="card-body">
                            <span class="title-card-news">Заголовок</span>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <a href="#" class="card-link">Читать</a>
                    </div>
                <?php } ?>
                <button id="btn-download-news" type="button" class="btn btn-raised btn-primary">Посмотреть еще новости</button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="js/news.js"></script>
@endsection