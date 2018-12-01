@extends('header')

@section('nav')
    <header>
        <div class="container">
            <div class="row">
                <div class="logo col-1 d-flex justify-content-center align-items-center">
                    <a class="navbar-brand" href="#">MGIMO</a>
                </div>
                <nav class=" navbar-main col-10" style="width:100%;">
                    <ul class="nav nav-tabs d-flex justify-content-around">
                        <li class="nav-item"><a class="nav-link" href="#">О юбилее</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Новости</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Мероприятия</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Поздравления</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Издательская программа</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Галерея</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Партнеры</a></li>
                    </ul>
                </nav>
                <div class="soc-net col-1 d-flex align-items-center justify-content-between">
                    <div class="">
                        <i>VK</i>
                    </div>
                    <div class="">
                        <i>IN</i>
                    </div>
                    <div class="">
                        <i>FB</i>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('banner')
    <div class="container">
        <div class="row">
            <div class="banner">
                <div class="text-banner">
                    <span style="">Заголовок <br> 75 лет МГИМО</span>
                </div>
                <div id="timer" class="timer d-flex justify-content-center"></div>
            </div>
        </div>
    </div>
@endsection

@section('news')
    <div class="container">
        <div class="row">
            <div class="contents d-flex">
                <div class="item-contents news col-8">
                    <div class="title-news">
                        <span>НОВОСТИ</span>
                    </div>
                    <div id="3" class="big-news col-12">
                        <article>
                            <span class="tag">РУБРИКА</span>
                            <h3>В МГИМО открыли бюст Имадеддина Насими</h3>
                            <span class="date-news">10 Ноября</span>
                        </article>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div id="2" class="small-new col-6">
                            <article>
                                <span class="tag">РУБРИКА</span>
                                <h4>Студентка МГИМО — победитель Young Tax Professional of the Year 2018</h4>
                                <span class="date-news">10 Ноября</span>
                            </article>
                        </div>
                        <div id="1" class="small-new col-6">
                            <article>
                                <span class="tag">РУБРИКА</span>
                                <h4>Встреча и награждение стипендиатов Международного Фонда Шодиева</h4>
                                <span class="date-news">10 Ноября</span>
                            </article>
                        </div>
                    </div>
                    <div class="buttons-news">
                        <button>Смотреть все новости</button>
                    </div>
                </div>
                <div class="item-contents events col-4 d-flex flex-column">
                    <div class="title-events">
                        <span>БЛИЖАЙШИЕ МЕРОПРИЯТИЯ </span>
                    </div>
                    <div class="item-events">
                        <article>
                            <span class="name-events">Собрание членов Попечительского совета и благотворителей Фонда имени Андрея Карлова</span>
                        </article>
                        <span class="date-events">10 Ноября</span>
                    </div>
                    <div class="item-events">
                        <article>
                            <span class="name-events">Посол Люксембурга Жан-Клод Кнебелер в МГИМО</span>
                        </article>
                        <span class="date-events">10 Ноября</span>
                    </div>
                    <div class="item-events">
                        <article>
                            <span class="name-events">Международный экономический форум «Каспийский диалог 2018»</span>
                        </article>
                        <span class="date-events">10 Ноября</span>
                    </div>
                    <div class="item-events">
                        <article>
                            <span class="name-events">Посол Люксембурга Жан-Клод Кнебелер в МГИМО</span>
                        </article>
                        <span class="date-events">10 Ноября</span>
                    </div>
                    <div class="buttons-news">
                        <button>Смотреть все мероприятия</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('media')
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
                <button type="button">Смотреть все новости СМИ</button>
            </div>
        </div>
    </div>
@endsection

@section('congratulations')
    <div id="congratulations" class="container">
        <div class="row">
            <div class="content-congratulations col-12">
                <div class="title-congratulations">
                    <span>Поздравления</span>
                </div>
                <div class="tags-congratulations col-12">
                    <span class="title-tag-congr">Год выпуска</span>
                    <div class="item-tags-congratulation">1960-70</div>
                    <div class="item-tags-congratulation">1970-80</div>
                    <div class="item-tags-congratulation">1980-90</div>
                    <div class="item-tags-congratulation active-item-tags-congratulations" >1990-00</div>
                    <div class="item-tags-congratulation">2000-10</div>
                    <div class="item-tags-congratulation">2010-18</div>
                </div>
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="item-congratulations">
                        <img class="img-item-congratulations img-thumbnail" src="http://img.over-blog-kiwi.com/1/54/00/21/20160804/ob_83b112_025pikachu-xy-anime-3.png" alt="">
                        <div class="content-item-congratulations">
                            <span class="title-item-congratulations">Заголовок заголовок Заголовок заголовок<br></span>
                            <span class="text-item-congratulations">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur assumenda doloribus minus necessitatibus quibusdam quidem repellendus repudiandae.</span>
                        </div>
                    </div>
                    <div class="item-congratulations">
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
                </div>
                <div class="btns-congratulations d-flex justify-content-between">
                    <button type="button" class="btn btn-raised btn-success">Смотреть все поздравления</button>
                    <button type="button" class="btn btn-raised btn-primary">Поздравить Alma Mater</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('gallery')
    <div class="bg-gallery">
        <div class="container">
            <div class="row">
                <div class="gallery-content">
                    <div class="big-photo"></div>
                    <div class="text-gallery">
                        <span class="title-text-gallery">Какой-то заголовок про галерею</span>
                        <button type="button" class="btn btn-raised btn-success">Смотреть фото</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('partners')
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

                            </div>
                            <div class="item-partner">

                            </div>
                            <div class="item-partner">

                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
@endsection