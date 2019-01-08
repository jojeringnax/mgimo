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
    <div class="container" style="margin-top: 120px; padding-bottom: 100px !important">
        <div class="row">
            <div class="layout_news d-flex flex-wrap">
                <div id="photos-news " class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-start">
                    <div class="anniversary-img">
                        <div class="item-img-news" style="text-align: center;">
                            <img src="img/icon/logo.svg" alt="" style="width: 40%">
                            <div class="hide-text">
                                <p class="text-left">В 2019 г. МГИМО исполняется 75 лет. Юбилейный год – уникальная
                                    возможность для продвижения и позиционирования МГИМО, в том числе в
                                    международной среде.
                                    Юбилейная кампания призвана охватить новые категории выпускников
                                    и абитуриентов, обеспечить долгосрочное, в том числе материальное,
                                    «наследие» юбилея, привлечь дополнительные средства на развитие
                                    университета. 75-летие Alma Mater придаст новый импульс развитию
                                    Ассоциации и всего сообщества выпускников МГИМО.
                                    МГИМО уже начал входить в год 75-летия. Уже в уходящем, 2018 г.
                                    прошел целый ряд юбилейных мероприятий – юбилеи факультетов
                                    Международных отношений, Международной журналистики,
                                    Международных экономических отношений, а также Парижская встреча
                                    выпускников двойных магистерских программ.
                                    Мы исходим из идеи «распределенного юбилея» – юбилея доступного
                                    и близкого каждому, разным представителям сообщества МГИМО.
                                </p>
                            </div>
                        </div>
                        <div class="item-img-news">
                            <img src="img/anniversary/1.jpg" alt="" style="width: 100%">
                            <div class="hide-text">
                                <ul class="text-left">
                                    <li>
                                        наших иностранных выпускников ожидает V Международный
                                        форум выпускников в Ташкенте (12-14 апреля);
                                    </li>
                                    <li>
                                        представителей бизнес-сообщества мы стенд на стенд и сессии
                                        МГИМО на Санкт-Петербургском международном
                                        экономическом форуме (6-8 июня);
                                    </li>
                                    <li>
                                        профессорско-преподавательский состав МГИМО и мгимовцы,
                                        работающие в исследовательских институтах и экспертных
                                        центрах соберутся на XII Конвенте РАМИ (октябрь);
                                    </li>
                                    <li>
                                        профессорско-преподавательский состав МГИМО и мгимовцы,
                                        работающие в исследовательских институтах и экспертных
                                        центрах соберутся на XII Конвенте РАМИ (октябрь);
                                    </li>
                                    <li>
                                        представители творческих профессий, любители искусства и
                                        культуры смогу принять участие в музыкальном фестивале в
                                        Парке Горького «Возвращаемся к Крымскому мосту» и
                                        традиционной Арт-выставке;
                                    </li>
                                    <li>
                                        основными спортивными мероприятиями станут Открытая
                                        универсиада МГИМО «Спортивные поколения», Кубки МГИМО
                                        по гольфу и футболу.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="item-img-news">
                            <img src="img/anniversary/2.jpg" alt="" style="width: 100%">
                            <div class="hide-text">
                                <p>Кульминацией будет торжественный вечер 15 октября. Сейчас мы
                                    определяемся с площадкой и с радостью примем Ваши предложения.
                                    В подготовку юбилея будет включен самый широкий круг
                                    МГИМОвцев, мы работаем по принципу «Crowd sourcing» - добровольной
                                    причастности.
                                </p>
                                <p>Объявлен конкурс на лучшие персональные истории («лонгриды»)
                                    МГИМОвцев в социальных сетях, фотосессии, видео, аудиоматериалы о
                                    МГИМО и около-МГИМОвской жизни на странице Ассоциации
                                    выпускников в Facebook. Инициировано переиздание каталогов выпускников
                                    и воспоминаний в т.ч. на электронных носителях.
                                </p>
                            </div>
                        </div>
                        <div class="item-img-news">
                            <img src="img/anniversary/3.jpg" alt="" style="width: 100%">
                            <div class="hide-text">
                                <p>
                                    Готовится сценарий полнометражного документального фильма о
                                    МГИМО (две группы, претендующие на съемки фильма, мы попросили
                                    подготовить свои содержательные и финансовые предложений).
                                    Начали выходить специальные выпуски газеты «Международник» о
                                    факультетах МГИМО. Буквально на днях мы ожидаем из типографии
                                    фотоальбом «МГИМО. Dignities» (о высоких и почетных гостях МГИМО) и
                                    четвертое издание книги «МГИМО-Университет. «Традиции и
                                    современность» в новом формате.
                                </p>
                            </div>
                        </div>
                        <div class="item-img-news">
                            <img src="img/anniversary/4.jpg" alt="" style="width: 100%">
                            <div class="hide-text">
                                <p>
                                    Будет продолжена практика регулярного издания MGIMO-Journal на
                                    английском и французском языках.
                                    Отдельной концептуальным «стержнем» юбилея должна стать
                                    «поколенческая консолидация» или «наставничество». Мы хотим начать
                                    регулярные Попечительские лекции, интегрировав их в учебный процесс.
                                    Выпускников 1990 – 2000-х годов, некогда активистов студенческих клубов
                                    и научных обществ, пригласим «вернуться» в МГИМО в год юбилея,
                                    поделиться опытом, принять участие в работе своих клубов на их
                                    современном этапе.
                                </p>
                            </div>
                        </div>
                        <div class="item-img-news">
                            <img src="img/anniversary/5.jpg" alt="" style="width: 100%">
                            <div class="hide-text">
                                <p>Мы исходим из того, что 75-летие оставит после себя долгосрочное
                                    материальное наследие юбилея. Мы считаем, что лучшим подарком МГИМО
                                    станут:</p>
                                <ul>
                                    <li>
                                        обновление и переформатирование библиотечного пространства
                                        МГИМО и МГИМО-Одинцово. Превращение читальных залов в
                                        интеллектуальные студенческие клубы;
                                    </li>
                                    <li>
                                        расширение экспозиции истории МГИМО и обновление Музея
                                        редкой книги;
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
                        <p>В 2019 г. МГИМО исполняется 75 лет. Юбилейный год – уникальная
                        возможность для продвижения и позиционирования МГИМО, в том числе в
                        международной среде.
                        Юбилейная кампания призвана охватить новые категории выпускников
                        и абитуриентов, обеспечить долгосрочное, в том числе материальное,
                        «наследие» юбилея, привлечь дополнительные средства на развитие
                        университета. 75-летие Alma Mater придаст новый импульс развитию
                        Ассоциации и всего сообщества выпускников МГИМО.
                        МГИМО уже начал входить в год 75-летия. Уже в уходящем, 2018 г.
                        прошел целый ряд юбилейных мероприятий – юбилеи факультетов
                        Международных отношений, Международной журналистики,
                        Международных экономических отношений, а также Парижская встреча
                        выпускников двойных магистерских программ.
                        Мы исходим из идеи «распределенного юбилея» – юбилея доступного
                            и близкого каждому, разным представителям сообщества МГИМО.</p>
                        <ul>
                            <li>
                                наших иностранных выпускников ожидает V Международный
                                форум выпускников в Ташкенте (12-14 апреля);
                            </li>
                            <li>
                                представителей бизнес-сообщества мы стенд на стенд и сессии
                                МГИМО на Санкт-Петербургском международном
                                экономическом форуме (6-8 июня);
                            </li>
                            <li>
                                профессорско-преподавательский состав МГИМО и мгимовцы,
                                работающие в исследовательских институтах и экспертных
                                центрах соберутся на XII Конвенте РАМИ (октябрь);
                            </li>
                            <li>
                                профессорско-преподавательский состав МГИМО и мгимовцы,
                                работающие в исследовательских институтах и экспертных
                                центрах соберутся на XII Конвенте РАМИ (октябрь);
                            </li>
                            <li>
                                представители творческих профессий, любители искусства и
                                культуры смогу принять участие в музыкальном фестивале в
                                Парке Горького «Возвращаемся к Крымскому мосту» и
                                традиционной Арт-выставке;
                            </li>
                            <li>
                                основными спортивными мероприятиями станут Открытая
                                универсиада МГИМО «Спортивные поколения», Кубки МГИМО
                                по гольфу и футболу.
                            </li>
                        </ul>

                        <p>Кульминацией будет торжественный вечер 15 октября. Сейчас мы
                            определяемся с площадкой и с радостью примем Ваши предложения.
                            В подготовку юбилея будет включен самый широкий круг
                            МГИМОвцев, мы работаем по принципу «Crowd sourcing» - добровольной
                            причастности.</p>
                        <p>Объявлен конкурс на лучшие персональные истории («лонгриды»)
                            МГИМОвцев в социальных сетях, фотосессии, видео, аудиоматериалы о
                            МГИМО и около-МГИМОвской жизни на странице Ассоциации
                            выпускников в Facebook. Инициировано переиздание каталогов выпускников
                            и воспоминаний в т.ч. на электронных носителях.</p>

                        <p>Готовится сценарий полнометражного документального фильма о
                            МГИМО (две группы, претендующие на съемки фильма, мы попросили
                            подготовить свои содержательные и финансовые предложений).
                            Начали выходить специальные выпуски газеты «Международник» о
                            факультетах МГИМО. Буквально на днях мы ожидаем из типографии
                            фотоальбом «МГИМО. Dignities» (о высоких и почетных гостях МГИМО) и
                            четвертое издание книги «МГИМО-Университет. «Традиции и
                            современность» в новом формате.</p>
                        <p>
                            Будет продолжена практика регулярного издания MGIMO-Journal на
                            английском и французском языках.
                            Отдельной концептуальным «стержнем» юбилея должна стать
                            «поколенческая консолидация» или «наставничество». Мы хотим начать
                            регулярные Попечительские лекции, интегрировав их в учебный процесс.
                            Выпускников 1990 – 2000-х годов, некогда активистов студенческих клубов
                            и научных обществ, пригласим «вернуться» в МГИМО в год юбилея,
                            поделиться опытом, принять участие в работе своих клубов на их
                            современном этапе.
                        </p>
                        <p>Мы исходим из того, что 75-летие оставит после себя долгосрочное
                        материальное наследие юбилея. Мы считаем, что лучшим подарком МГИМО
                            станут:</p>
                        <ul>
                            <li>
                                обновление и переформатирование библиотечного пространства
                                МГИМО и МГИМО-Одинцово. Превращение читальных залов в
                                интеллектуальные студенческие клубы;
                            </li>
                            <li>
                                расширение экспозиции истории МГИМО и обновление Музея
                                редкой книги;
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
@endsection