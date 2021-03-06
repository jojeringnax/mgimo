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
            <div class="img-contacts d-flex col-xl-7 col-lg-7 col-md-10 col-sm-12 flex-wrap justify-content-between" style="margin-top: 80px;">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 d-flex align-items-center flex-column">
                    <a target="_blank" href="alumni.mgimo.ru" style="min-height: 150px"><img src="{{asset('img/contacts1.jpg')}}" alt="" style="width: 100%"></a>
                    <span class="title-contacts-page text-center"><?= trans('messages.cont__assoc') ?><br /> <?= trans('messages.cont__alumni__association') ?></span><br/>
                    <span class="text-contacts-page text-center">
                        <a href="tel:+74952254049">+7(495)225-40-49 </a><br />
                        <a href="mailto:alumni@mgimo.ru">alumni@mgimo.ru</a> <br />
                        <?= trans('messages.on__participation__in__events') ?>
                    </span>
                </div>
                <hr class="hr-contacts" />
                <div class="col-xl-5 col-lg-5 col-md-6 colsm-12 d-flex align-items-center flex-column justify-content-center">
                    <a target="_blank" href="http://fund.mgimo.ru/" style="min-height: 150px"><img src="{{asset('img/contacts2.jpg')}}" alt="" style="width: 100%"></a>
                    <span class="title-contacts-page text-center">
                        <?= trans('messages.Fund__of__development__MGIMO') ?>
                    </span>
                    <br/>
                    <span class="text-contacts-page text-center">
                        <a href="tel:+74952294137">+7(495)229-41-37 </a><br />
                        <a href="mailto:fund@mgimo.ru">fund@mgimo.ru</a> <br />
                        <?= trans('messages.on__cooperation__issues') ?><br />
                    </span>
                </div>
            </div>
            <div id="press-btn-contact" class="press-btn col-12">
                <a class="btn-linkk" target="_blank" href="https://mgimo.ru/about/structure/press/"><span class="text-btn"><?= trans('messages.press__service') ?></span><span class="arrow-btn"></span></a>
            </div>
            <a class="nav-link" href="https://mgimo.ru/about/today/logo/" style="font-size: 16px; margin-top: 15px; text-decoration: underline !important;" target="_blank"><?= trans('messages.download__logo') ?></a>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/locations.js')}}"></script>
@endsection