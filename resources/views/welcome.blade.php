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
            <div class="contents d-flex">
                <div class="item-contents news col-8">
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
                        <button>Смотреть все новости <span></span></button>
                    </div>
                </div>
                <div class="item-contents events col-4 d-flex flex-column">
                    <div class="title-events">
                        <span>БЛИЖАЙШИЕ МЕРОПРИЯТИЯ </span>
                    </div>
                    @for ($i = 0; $i < 7; $i++)
                        <a href="" style="text-decoration: none">
                            <div class="item-events">
                                <article>
                                    <span class="name-events">Международный экономический форум «Каспийский диалог 2018»</span>
                                </article>
                                <span class="date-events">10 Ноября</span>
                                <span class="location"></span>
                                <hr>
                            </div>
                        </a>
                    @endfor
{{--                    <div class="item-events">
                        <article>
                            <span class="name-events">Посол Люксембурга Жан-Клод Кнебелер в МГИМО</span>
                        </article>
                        <span class="date-events">10 Ноября</span>
                        <hr>
                    </div>--}}
                    <div class="buttons-news">
                        <button>Смотреть все мероприятия <span></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="media" class="container">
        <div class="row">
            <div class="content-media col-12">
                <div class="title-media">Сми о нас</div>
                <div class="media-news col-12 d-flex fle-wrap justify-content-between">
                    <div class="col-3 item-media-news d-flex">
                        <span class="source-media-news">Lenta.ru</span>
                        <span class="title-media-news">
                            Собрание членов Попечительского совета и благотворителей Фонда имени Андрея Карлова
                        </span>
                    </div>
                    <div class="col-3 item-media-news d-flex">
                        <hr>
                        <span class="source-media-news">Yandex</span>
                        <span class="title-media-news">Посол Люксембурга Жан-Клод Кнебелер в МГИМО</span>
                    </div>
                    <div class="col-3 item-media-news d-flex">
                        <hr>
                        <span class="source-media-news">Rambler</span>
                        <span class="title-media-news">Международный экономический форум «Каспийский диалог 2018»</span>
                    </div>
                    <div class="col-3 item-media-news d-flex">
                        <hr>
                        <span class="source-media-news">Lenta.ru</span>
                        <span class="title-media-news">Собрание членов Попечительского совета и благотворителей Фонда имени Андрея Карлова</span>
                    </div>
                </div>
            </div>
            <div class="btn-media">
                <button>Смотреть все новости СМИ<span></span></button>
            </div>
            <hr class="section-hr">
        </div>
    </div>

    <div id="congratulations" class="container">
        <div class="row">
            <div class="content-congratulations col-12">
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
                            <div class="tag"><i></i><span>1940-70</span></div>
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
                    <button type="button" class="btn-watch-congr">Смотреть все поздравления <span class="congr_watch"></span></button>
                    <button type="button" class="btn-congr"><span class="congr_icon"></span>Поздравить Alma Mater</button>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gallery">
        <div class="container">
            <div class="row">
                <div class="gallery-content">
                    <div class="big-photo"><img src="img/new_test/collage.png" alt=""></div>
                    <div class="text-gallery">
                        <span class="title-text-gallery">Мы собрали самые сокровенные моменты из жизни Эрнеста</span>
                        <button type="button" class="">Смотреть фото <span></span></button>
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
                <div class="arrow next"></div>
                <div class="arrow prev"></div>
                <div class="partners owl-carousel owl-theme">
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
            <button type="button" class="btn-partners">Смотреть всех партнеров <span></span></button>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/OwlCarousel2/dist/owl.carousel.min.js')}}"></script>
@endsection