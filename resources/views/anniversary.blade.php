@extends('layout')
@section('link')
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
@endsection
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection
@section('color')
    background-color: white !important;
@endsection
@section('content')
    <div class="container container-content" style="margin-top: 120px; padding-bottom: 100px">
        <div class="row">
            <div class="layout_news d-flex flex-wrap">
                <div id="photos-news " class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-start">
                    <div class="anniversary-img">
                        <div class="item-img-news" style="text-align: center;">
                            <img src="img/icon/logo.svg" alt="" style="width: 40%">
                            <div class="hide-text">
                                <p class="text-left">
                                    В 2019 г. <a href="https://mgimo.ru/" target="_blank">МГИМО</a> исполняется 75 лет. Юбилейный год – уникальная
                                    возможность для продвижения и позиционирования <a href="https://mgimo.ru/" target="_blank">МГИМО</a>, в том числе в
                                    международной среде.
                                </p>
                                <p>
                                    Юбилейная кампания призвана охватить новые категории выпускников
                                    и абитуриентов, обеспечить долгосрочное, в том числе материальное,
                                    «наследие» юбилея, привлечь дополнительные средства на <a href="http://fund.mgimo.ru/" target="_blank">развитие
                                        университета</a>. 75-летие Alma Mater придаст новый импульс развитию
                                    Ассоциации и всего сообщества выпускников <a href="https://mgimo.ru/" target="_blank">МГИМО</a>.
                                </p>
                                <p>
                                    <a href="https://mgimo.ru/" target="_blank">МГИМО</a> уже начал входить в год 75-летия. В 2018 г.
                                    прошел целый ряд юбилейных мероприятий – юбилеи факультетов
                                    <a href="https://mgimo.ru/study/faculty/mo/" target="_blank">Международных отношений</a>,
                                    <a href="https://mgimo.ru/study/faculty/journalism/" target="_blank">Международной журналистики</a>,
                                    <a href="https://mgimo.ru/study/faculty/meo/" target="_blank">Международных экономических отношений</a>, а также Парижская встреча
                                    выпускников двойных <a href="https://mgimo.ru/study/master/" target="_blank">магистерских программ</a>.
                                    Мы исходим из идеи «распределенного юбилея» – юбилея доступного
                                    и близкого каждому, разным представителям сообщества <a href="https://mgimo.ru/" target="_blank">МГИМО</a>.
                                    <br/>
                                </p>

                            </div>
                        </div>
                        <div class="item-img-news">
                            <img src="img/anniversary/1.jpg" alt="images_anniversary_1" style="width: 100%">
                            <div class="hide-text">
                                <ul class="text-left">
                                    <li>
                                        наших иностранных выпускников ожидает
                                        <a href="http://alumniforum.mgimo.ru/" target="_blank">V Международный
                                            форум выпускников в Ташкенте</a> (17-19 Мая);
                                    </li>
                                    <li>
                                        представителей бизнес-сообщества мы стенд на стенд и сессии
                                        <a href="https://mgimo.ru/" target="_blank">МГИМО</a> на Санкт-Петербургском международном
                                        экономическом форуме (6-8 июня);
                                    </li>
                                    <li>
                                        профессорско-преподавательский состав <a href="https://mgimo.ru/" target="_blank">МГИМО</a> и мгимовцы,
                                        работающие в исследовательских институтах и экспертных
                                        центрах соберутся на <a href="http://www.risa.ru/ru/" target="_blank">XII Конвенте РАМИ </a>(21-22 октября);
                                    </li>
                                    <li>
                                        представители творческих профессий, любители искусства и
                                        культуры смогу принять участие в музыкальном фестивале в
                                        Парке Горького «Возвращаемся к Крымскому мосту» и
                                        традиционной Арт-выставке;
                                    </li>
                                    <li>
                                        основными спортивными мероприятиями станут Открытая
                                        универсиада <a href="https://mgimo.ru/" target="_blank">МГИМО</a> «Спортивные поколения», Кубки <a href="https://mgimo.ru/" target="_blank">МГИМО</a>
                                        по гольфу и футболу.
                                    </li>
                                    <li>кульминацией будет торжественный вечер 23 октября.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="item-img-news">
                            <img src="img/anniversary/2.jpg" alt="" style="width: 100%">
                            <div class="hide-text">
                                <p>
                                    В подготовку юбилея будет включен самый широкий круг
                                    МГИМОвцев, мы работаем по принципу «Crowd sourcing» - добровольной
                                    причастности.
                                </p>
                                <p>
                                    Объявлен конкурс на лучшие персональные истории («лонгриды»)
                                    МГИМОвцев в социальных сетях, фотосессии, видео, аудиоматериалы о
                                    <a href="https://mgimo.ru/" target="_blank">МГИМО</a> и около-МГИМОвской жизни на странице
                                    <a href="http://alumni.mgimo.ru/page/main.seam?ssoRedirect=true" target="_blank">Ассоциации
                                        выпускников</a> в Facebook. Инициировано переиздание каталогов выпускников
                                    и воспоминаний в т.ч. на электронных носителях. Готовится сценарий полнометражного документального фильма о
                                    <a href="https://mgimo.ru/" target="_blank">МГИМО</a>.
                                </p>
                            </div>
                        </div>
                        <div class="item-img-news">
                            <img src="img/anniversary/3.jpg" alt="" style="width: 100%">
                            <div class="hide-text">
                                <p>
                                    Начали выходить специальные выпуски <a href="https://mgimo.ru/about/structure/period/mezhdunarodnik/" target="_blank">газеты «Международник»</a> о
                                    факультетах <a href="https://mgimo.ru/" target="_blank">МГИМО</a>. Буквально на днях мы ожидаем из типографии
                                    фотоальбом «МГИМО. Dignities» (о высоких и почетных гостях <a href="https://mgimo.ru/" target="_blank">МГИМО</a>) и
                                    четвертое издание книги «МГИМО-Университет. «Традиции и
                                    современность» в новом формате. Будет продолжена практика регулярного издания <a
                                            href="https://mgimo.ru/about/structure/period/mgimo-journal/" target="_blank"></a>MGIMO-Journal на
                                    английском и французском языках.
                                </p><br/>
                            </div>
                        </div>
                        <div class="item-img-news">
                            <img src="img/anniversary/4.jpg" alt="" style="width: 100%">
                            <div class="hide-text">
                                <p>
                                    Отдельной концептуальным «стержнем» юбилея должна стать
                                    «поколенческая консолидация» или «наставничество». Мы хотим начать
                                    регулярные <a href="https://mgimo.ru/about/board-of-trustees/" target="_blank">Попечительские</a> лекции, интегрировав их в учебный процесс.
                                </p><br/>
                                <p>
                                    Выпускников 1990 – 2000-х годов, некогда <a href="https://mgimo.ru/about/structure/student-org/" target="_blank">активистов студенческих клубов</a>
                                    и научных обществ, пригласим «вернуться» в <a href="https://mgimo.ru/" target="_blank">МГИМО</a> в год юбилея,
                                    поделиться опытом, принять участие в работе своих клубов на их
                                    современном этапе.
                                </p><br/>
                            </div>
                        </div>
                        <div class="item-img-news">
                            <img src="img/anniversary/5.jpg" alt="" style="width: 100%">
                            <div class="hide-text">
                                <p>Мы исходим из того, что 75-летие оставит после себя долгосрочное
                                    материальное наследие юбилея. Мы считаем, что лучшим подарком <a href="https://mgimo.ru/" target="_blank">МГИМО</a>
                                    станут:
                                </p>
                                <ul>
                                    <li>
                                        обновление и переформатирование библиотечного пространства
                                        <a href="https://mgimo.ru/" target="_blank">МГИМО</a> и <a href="http://odin.mgimo.ru/" target="_blank">МГИМО-Одинцово</a>. Превращение читальных залов в
                                        интеллектуальные студенческие клубы;
                                    </li>
                                    <li>
                                        расширение экспозиции <a href="https://mgimo.ru/about/structure/uvr/museum/" target="_blank">Музея истории МГИМО</a> и обновление
                                        <a href="https://mgimo.ru/library/scientific-library/muzey-knigi/" target="_blank">Музея редкой книги</a>М;
                                    </li>
                                    <li>
                                        создание современного конференц-пространства на базе
                                        отреставрированного Зала №2 и холла, примыкающего к нему;
                                    </li>
                                    <li>
                                        реконструкция открытых спортивных площадок и обновление
                                        шахматной гостиной.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="anniversary-content col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12 flex-column justify-content-start">
                    <div class="title-a" style="margin-top: 10px">
                        <h2>О Юбилее</h2>
                    </div>
                    <div class="title-news" >
                        <p class="text-left">
                            В 2019 г. <a href="https://mgimo.ru/" target="_blank">МГИМО</a> исполняется 75 лет. Юбилейный год – уникальная
                            возможность для продвижения и позиционирования <a href="https://mgimo.ru/" target="_blank">МГИМО</a>, в том числе в
                            международной среде.
                        </p><br/>
                        <p>
                            Юбилейная кампания призвана охватить новые категории выпускников
                            и абитуриентов, обеспечить долгосрочное, в том числе материальное,
                            «наследие» юбилея, привлечь дополнительные средства на <a href="http://fund.mgimo.ru/" target="_blank">развитие университета</a>. 75-летие Alma Mater придаст новый импульс развитию
                            Ассоциации и всего сообщества выпускников <a href="https://mgimo.ru/" target="_blank">МГИМО</a>.
                        </p><br/>
                        <p>
                            <a href="https://mgimo.ru/" target="_blank">МГИМО</a> уже начал входить в год 75-летия. В 2018 г.
                            прошел целый ряд юбилейных мероприятий – юбилеи факультетов
                            <a href="https://mgimo.ru/study/faculty/mo/" target="_blank">Международных отношений</a>,
                            <a href="https://mgimo.ru/study/faculty/journalism/" target="_blank">Международной журналистики</a>,
                            <a href="https://mgimo.ru/study/faculty/meo/" target="_blank">Международных экономических отношений</a>, а также Парижская встреча
                            выпускников двойных <a href="https://mgimo.ru/study/master/" target="_blank">магистерских программ</a>.
                            Мы исходим из идеи «распределенного юбилея» – юбилея доступного
                            и близкого каждому, разным представителям сообщества <a href="https://mgimo.ru/" target="_blank">МГИМО</a>.
                            <br/>
                        </p><br/>
                        <ul class="text-left">
                            <li>
                                наших иностранных выпускников ожидает
                                <a href="http://alumniforum.mgimo.ru/" target="_blank">V Международный
                                    форум выпускников в Ташкенте</a> (17-19 Мая);
                            </li>
                            <li>
                                представителей бизнес-сообщества мы приглашаем на стенд и сессии
                                <a href="https://mgimo.ru/" target="_blank">МГИМО</a> на Санкт-Петербургском международном
                                экономическом форуме (6-8 июня);
                            </li>
                            <li>
                                профессорско-преподавательский состав <a href="https://mgimo.ru/" target="_blank">МГИМО</a> и мгимовцы,
                                работающие в исследовательских институтах и экспертных
                                центрах соберутся на <a href="http://www.risa.ru/ru/" target="_blank">XII Конвенте РАМИ </a>(21-22 октября);
                            </li>
                            <li>
                                представители творческих профессий, любители искусства и
                                культуры смогу принять участие в музыкальном фестивале в
                                Парке Горького «Возвращаемся к Крымскому мосту» и
                                традиционной Арт-выставке;
                            </li>
                            <li>
                                основными спортивными мероприятиями станут Открытая
                                универсиада <a href="https://mgimo.ru/" target="_blank">МГИМО</a> «Спортивные поколения», Кубки <a href="https://mgimo.ru/" target="_blank">МГИМО</a>
                                по гольфу и футболу.
                            </li>
                            <li>кульминацией будет торжественный вечер 23 октября.</li>
                        </ul>

                        <p>
                            В подготовку юбилея будет включен самый широкий круг
                            МГИМОвцев, мы работаем по принципу «Crowd sourcing» - добровольной
                            причастности.
                        </p><br/>
                        <p>
                            Объявлен конкурс на лучшие персональные истории («лонгриды»)
                            МГИМОвцев в социальных сетях, фотосессии, видео, аудиоматериалы о
                            <a href="https://mgimo.ru/" target="_blank">МГИМО</a> и около-МГИМОвской жизни на странице
                            <a href="http://alumni.mgimo.ru/page/main.seam?ssoRedirect=true" target="_blank">Ассоциации
                                выпускников</a> в Facebook. Инициировано переиздание каталогов выпускников
                            и воспоминаний в т.ч. на электронных носителях. Готовится сценарий полнометражного документального фильма о
                            <a href="https://mgimo.ru/" target="_blank">МГИМО</a>.
                        </p><br/>
                        <p>
                            Начали выходить специальные выпуски <a href="https://mgimo.ru/about/structure/period/mezhdunarodnik/" target="_blank">газеты «Международник»</a> о
                            факультетах <a href="https://mgimo.ru/" target="_blank">МГИМО</a>. Буквально на днях мы ожидаем из типографии
                            фотоальбом «МГИМО. Dignities» (о высоких и почетных гостях <a href="https://mgimo.ru/" target="_blank">МГИМО</a>) и
                            четвертое издание книги «МГИМО-Университет. «Традиции и
                            современность» в новом формате. Будет продолжена практика регулярного издания <a
                                    href="https://mgimo.ru/about/structure/period/mgimo-journal/" target="_blank"></a>MGIMO-Journal на
                            английском и французском языках.
                        </p><br/>
                        <p>
                            Отдельной концептуальным «стержнем» юбилея должна стать
                            «поколенческая консолидация» или «наставничество». Мы хотим начать
                            регулярные <a href="https://mgimo.ru/about/board-of-trustees/" target="_blank">Попечительские</a> лекции, интегрировав их в учебный процесс.
                        </p><br/>
                        <p>
                            Выпускников 1990 – 2000-х годов, некогда <a href="https://mgimo.ru/about/structure/student-org/" target="_blank">активистов студенческих клубов</a>
                            и научных обществ, пригласим «вернуться» в <a href="https://mgimo.ru/" target="_blank">МГИМО</a> в год юбилея,
                            поделиться опытом, принять участие в работе своих клубов на их
                            современном этапе.
                        </p><br/>
                        <p>Мы исходим из того, что 75-летие оставит после себя долгосрочное
                            материальное наследие юбилея. Мы считаем, что лучшим подарком <a href="https://mgimo.ru/" target="_blank">МГИМО</a>
                            станут:
                        </p><br/>
                        <ul>
                            <li>
                                обновление и переформатирование библиотечного пространства
                                <a href="https://mgimo.ru/" target="_blank">МГИМО</a> и <a href="http://odin.mgimo.ru/" target="_blank">МГИМО-Одинцово</a>. Превращение читальных залов в
                                интеллектуальные студенческие клубы;
                            </li>
                            <li>
                                расширение экспозиции <a href="https://mgimo.ru/about/structure/uvr/museum/" target="_blank">Музея истории МГИМО</a> и обновление
                                <a href="https://mgimo.ru/library/scientific-library/muzey-knigi/" target="_blank">Музея редкой книги</a>;
                            </li>
                            <li>
                                создание современного конференц-пространства на базе
                                отреставрированного Зала №2 и холла, примыкающего к нему;
                            </li>
                            <li>
                                реконструкция открытых спортивных площадок и обновление
                                шахматной гостиной.
                            </li>
                        </ul>
                    </div>
                    <div class="text-news">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/anniversary.js')}}"></script>
    <script src="{{asset('js/locations.js')}}"></script>
@endsection