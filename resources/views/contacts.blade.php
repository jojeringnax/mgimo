@extends('layout')
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection
@section('color')
    background-color: white !important;
@endsection
@section('content')
    <div class="container" style="margin-top: 120px; padding-bottom: 120px;">
        <div class="row d-flex justify-content-center">
            <div class="contacts d-flex flex-column text-center col-xl-7 col-lg-7 col-md-10 col-sm-12">
                <span class="title-contacts-page">Ассоциация <br /> выпускников МГИМО</span><br/>
                </span>
                <span class="text-contacts-page">
                    +7(495)225-40-49<br />
                    alumni@mgimo.ru<br />
                    По вопросам участия в мероприятиях=
                </span>
                <br/>
                </span>
                <span class="title-contacts-page">
                    Фонд развития МГИМО
                </span>
                <br/>
                <span class="text-contacts-page">
                    <a href="tel:+7(495)229-41-37">+7(495)229-41-37 </a><br />
                    <a href="mailto:fund@mgimo.ru">fund@mgimo.ru</a> <br />
                    По вопросам сотрудничества
                </span>
            </div>
            <div class="img-contacts d-flex col-xl-7 col-lg-7 col-md-10 col-sm-12 flex-wrap justify-content-between" style="margin-top: 80px;">
                <div class="col-xl-5 col-lg-5 col-md-6 colsm-12 d-flex align-items-center">
                    <img src="img/contacts1.jpg" alt="" style="width: 100%">
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 colsm-12 d-flex align-items-center">
                    <img src="img/contacts2.jpg" alt="" style="width: 100%">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/locations.js')}}"></script>
@endsection