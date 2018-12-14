@extends('layout')

@section('link')
    <link rel="stylesheet" href="js/OwlCarousel2/dist/assets/owl.carousel.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="banner">
                <div class="text-banner">
                    <span style=""><span class="years">75</span> лет<br> МГИМО</span>
                </div>
                <div class="timer-lay">
                    <div id="timer" class="timer d-flex justify-content-center"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="contents d-flex flex-wrap">
                <div class="item-contents news col-xl-8 col-lg-8 col-md-12 col-12">
                    <div class="title-news">
                        <span>НОВОСТИ</span>
                    </div>
                    <div id="3" class="big-news col-12">
                        <div class="layout-big-new"></div>
                        <article>
                            <div class="tag">
                                <i></i>
                                <span>РУБРИКА</span>
                            </div>
                            <h3>В МГИМО открыли бюст Имадеддина Насими</h3>
                            <span class="date-news">10 Ноября 2018</span>
                        </article>
                    </div>
                    <div class="small-news">
                        <div id="2" class="small-new col-12">
                            <article class="d-flex flex-wrap">
                                <div class="img-small-new">
                                    <img src="img/new_test/Mask_Group_20.png" alt="">
                                </div>
                                <div class="content-small-new">
                                    <div class="tag">
                                        <i></i>
                                        <span>РУБРИКА</span>
                                    </div>
                                    <h4>Студентка МГИМО — победитель Young Tax Professional of the Year 2018</h4>
                                    <div class="date-link d-flex justify-content-between" style="width: 100%">
                                        <span class="date-news">10 Ноября 2018</span>
                                        <a href="">Читать новость</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div id="1" class="small-new col-12">
                            <article class="d-flex flex-wrap">
                                <div class="img-small-new">
                                    <img src="img/new_test/Mask_Group_18.png" alt="">
                                </div>
                                <div class="content-small-new">
                                    <div class="tag">
                                        <i></i>
                                        <span>РУБРИКА</span>
                                    </div>
                                    <h4>Встреча и награждение стипендиатов Международного Фонда Шодиева</h4>
                                    <div class="date-link d-flex justify-content-between" style="width: 100%">
                                        <span class="date-news">10 Ноября 2018</span>
                                        <a href="">Читать новость</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="buttons-news">
                        <a>Смотреть все новости <span></span></a>
                    </div>
                </div>
                <div class="item-contents events col-xl-4 col-lg-4 col-md-12 d-flex flex-column">
                    <div class="title-events">
                        <span>БЛИЖАЙШИЕ МЕРОПРИЯТИЯ </span>
                    </div>
                    @for ($i = 0; $i < 6; $i++)
                        <div class="item-events">
                            <article>
                                <span class="name-events">Международный экономический форум «Каспийский диалог 2018»</span>
                            </article>
                            <div class="d-flex flex-wrap justify-content-between">
                                <span class="date-events"><span class="icon-date-events"></span>22 декабря 2018</span>
                                <span class="location"><span class="icon-location-events"></span>ДК украинских армян</span>
                            </div>
                            @if ($i !== 5)
                                <hr>
                            @endif
                        </div>
                    @endfor
{{--                    <div class="item-events">
                        <article>
                            <span class="name-events">Посол Люксембурга Жан-Клод Кнебелер в МГИМО</span>
                        </article>
                        <span class="date-events">10 Ноября</span>
                        <hr>
                    </div>--}}
                    <div class="buttons-news" style="margin-top: 60px;">
                        <a>Смотреть все мероприятия <span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="media" class="container">
        <div class="row" style="margin: 0; padding: 0">
            <div class="content-media col-12">
                <div class="title-media">Сми о нас</div>
                <div class="media-news col-12 d-flex fle-wrap justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 item-media-news d-flex">
                        <span class="source-media-news">Lenta.ru</span>
                        <span class="title-media-news" style="margin:0">Посол Люксембурга Жан-Клод Кнебелер в МГИМО</span>
                        <span class="media-news-date" style="margin:0">10 Ноября 2018</span>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 item-media-news d-flex">
                        <hr>
                        <span class="source-media-news">Yandex</span>
                        <span class="title-media-news">Посол Люксембурга Жан-Клод Кнебелер в МГИМО</span>
                        <span class="media-news-date">10 Ноября 2018</span>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 item-media-news d-flex">
                        <hr>
                        <span class="source-media-news">Rambler</span>
                        <span class="title-media-news">Международный экономический форум «Каспийский диалог 2018»</span>
                        <span class=" media-news-date">10 Ноября 2018</span>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 item-media-news d-flex">
                        <hr>
                        <span class="source-media-news">Lenta.ru</span>
                        <span class="title-media-news">Собрание членов Попечительского совета и благотворителей Фонда имени Андрея Карлова</span>
                        <span class="media-news-date">10 Ноября 2018</span>
                    </div>
                </div>
            </div>
            <div class="btn-media">
                <a>Смотреть все новости СМИ<span></span></a>
            </div>
            <hr class="section-hr">
        </div>
    </div>

    <div id="congratulations" class="container">
        <div class="row" style="margin:0; padding: 0">
            <div class="content-congratulations col-12" style="padding: 0">
                <div class="title-congratulations">
                    <span>Поздравления</span>
                </div>
{{--                <div class="tags-congratulations col-12">
                    <span class="title-tag-congr">Год выпуска</span>
                    <div class="item-tags-congratulation">1960-70</div>
                    <div class="item-tags-congratulation">1970-80</div>
                    <div class="item-tags-congratulation">1980-90</div>
                    <div class="item-tags-congratulation active-item-tags-congratulations" >1990-00</div>
                    <div class="item-tags-congratulation">2000-10</div>
                    <div class="item-tags-congratulation">2010-18</div>
                </div>--}}

                <div class="d-flex flex-wrap justify-content-between">
                    @for ($i = 0; $i < 4; $i++)
                    <div class="item-congratulations card">
                        <img class="img-item-congratulations img-thumbnail" src="http://img.over-blog-kiwi.com/1/54/00/21/20160804/ob_83b112_025pikachu-xy-anime-3.png" alt="">
                        <div class="content-item-congratulations">
                            <span class="title-item-congratulations">Заголовок заголовок Заголовок заголовок<br></span>
                            <span class="text-item-congratulations">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur assumenda doloribus minus necessitatibus quibusdam quidem repellendus repudiandae.</span>
                        </div>
                    </div>
                    @endfor
                </div>

{{--                    <div class="item-congratulations">
                        <img class="img-item-congratulations img-thumbnail" src="http://img.over-blog-kiwi.com/1/54/00/21/20160804/ob_83b112_025pikachu-xy-anime-3.png" alt="">
                        <div class="content-item-congratulations">
                            <span class="title-item-congratulations">Заголовок заголовок Заголовок заголовок<br></span>
                            <span class="text-item-congratulations">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at, distinctio eos modi natus quasi. Deserunt, excepturi!</span>
                        </div>
                    </div>
                    <div class="item-congratulations">
                        <img class="img-item-congratulations img-thumbnail" src="http://img.over-blog-kiwi.com/1/54/00/21/20160804/ob_83b112_025pikachu-xy-anime-3.png" alt="">
                        <div class="content-item-congratulations">
                            <span class="title-item-congratulations">Заголовок заголовок Заголовок заголовок<br></span>
                            <span class="text-item-congratulations">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet dolores laudantium omnis! Obcaecati ullam veniam vero?</span>
                        </div>
                    </div>
                    <div class="item-congratulations">
                        <img class="img-item-congratulations img-thumbnail" src="http://img.over-blog-kiwi.com/1/54/00/21/20160804/ob_83b112_025pikachu-xy-anime-3.png" alt="">
                        <div class="content-item-congratulations">
                            <span class="title-item-congratulations">Заголовок заголовок Заголовок заголовок<br></span>
                            <span class="text-item-congratulations">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi perspiciatis quod voluptas voluptatum. Magni, minima, sequi.</span>
                        </div>
                    </div>
                </div>--}}
                <div class="btns-congratulations d-flex justify-content-between">
                    <a href="" class="btn-watch-congr">Смотреть все поздравления <span class="congr_watch"></span></a>
                    <a href="" class="btn-congr"><span class="congr_icon"></span>Поздравить Alma Mater</a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gallery">
        <div class="container">
            <div class="row">
                <div class="gallery-content d-flex ">
                    <div class="big-photo col-xl-6 col-lg-6 col-md-12"><img src="img/new_test/collage.png" alt=""></div>
                    <div class="text-gallery col-xl-6 col-lg-6 col-md-12">
                        <span class="title-text-gallery">Мы собрали самые сокровенные моменты из жизни Эрнеста</span>
                        <a href="" class="">Смотреть фото <span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="content-partners" style="width: 100%">
                <div class="title-partners">
                    <span>Партнеры</span>
                </div>
                <div data-arrow = "right" class="arrow next"></div>
                <div data-arrow = "left" class="arrow prev"></div>
                <div class="d-flex justify-content-center">
                    <div class="partners owl-carousel owl-theme col-xl-10 col-lg-8 col-md-6 col-6 justify-content-center">
                        <?php for ($i=0;$i<=19;$i++) { ?>
                        <div class="item">
                            <div class="item-partner">
                                <img src="img/partners/partner1.svg" alt="">
                            </div>
                            <div class="item-partner">
                                <img src="img/partners/partner2.svg" alt="">
                            </div>
                            <div class="item-partner">
                                <img src="img/partners/partner3.svg" alt="">
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <a href="" class="btn-partners">Смотреть всех партнеров <span></span></a>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/OwlCarousel2/dist/owl.carousel.min.js')}}"></script>
@endsection