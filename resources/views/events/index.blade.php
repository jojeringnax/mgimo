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
                        <?php for ($i=1;$i<=5;$i++) { ?>
                            <span class="tag">РУБРИКА</span>
                        <?php } ?>
                    </div>
                    <div class="items-event-page d-flex flex-wrap justify-content-between">
                        <?php for ($i=1;$i<=12;$i++) { ?>
                            <div class="item">
                                <span class="title-item">
                                    Встреча и награждение стипендиатов Международного Фонда Шодиева
                                </span>
                                <span class="date-item">19 Ноября</span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="js/events.js"></script>
@endsection