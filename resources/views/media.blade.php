@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="media-page d-flex flex-column">
                <div class="title-media">
                    <span>СМИ о нас</span>
                </div>
                <div class="media-page-content d-flex justify-content-between flex-wrap">
                    <?php for ($i=1;$i<=16;$i++) { ?>
                        <div class="col-3 item-media-news d-flex">
                            <span class="source-media-news">Lenta.ru</span>
                            <span class="title-media-news">
                                Собрание членов Попечительского совета и благотворителей Фонда имени Андрея Карлова
                            </span>
                            <?php if ($i%4 != 0) { ?> <hr> <?php }?>
                        </div>
                    <?php } ?>
                </div>
                <button id="btn-download-media" type="button" class="btn btn-raised btn-primary">Подгрузить еще новостей</button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="js/media.js"></script>
@endsection