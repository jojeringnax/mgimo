@extends('layout')

@section('link')
@endsection
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection
@section('color')
    background-color: white !important;
@endsection
@section('content')
    <div class="layout-img hide">
        <div class="layout">
        </div>
        <div class="img-source-layout">
            <a href="" download="proposed_file_name"><img src="" alt=""></a>
        </div>
    </div>
    <div id="congratulations" class="container container-content" style="padding-bottom: 120px; margin-top: 120px;">
        <div class="row" style="margin:0; padding: 0">
            <div class="btns-congratulations d-flex justify-content-xl-start justify-content-sm-center">
                <a href="" data-toggle="modal" data-target="#congratulationModule" class="btn-congr btn-mgimo"><span class="congr_icon"></span><?= trans('messages.congratulate_mgimo') ?></a>
            </div>
            <div class="content-congratulations col-12" style="padding: 0">
                {{--<div class="title-congratulations">--}}
                    {{--<span>Поздравления</span>--}}
                {{--</div>--}}

                <div id="congratulations_wrapper" class="d-flex flex-wrap justify-content-between">
                    @foreach ($congratulations as $congratulation)
                        <div class="item-congratulations">
                            @if(!preg_match('/<iframe*/', $congratulation->content))
                                <img class="img-item-congratulations img-thumbnail" src="{{ $congratulation->mainPhoto !== null ? $congratulation->mainPhoto->path : url('img/no-image.png')}}" alt="" />
                            @else
                                <div class="img-item-congratulations">{!! html_entity_decode($congratulation->content) !!}</div>
                            @endif
                            <div class="content-item-congratulations">
                                <span class="title-item-congratulations">{{ $congratulation->title }}<br></span>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if($congratulationsNumber > 4)
                    <div class="d-flex justify-content-center" style="width: 100%; margin-top: 100px;">
                        <a id="btn-download-congratulations-page" href=""><?= trans('messages.congratulations__more__congratulations') ?></a>
                    </div>
                @endif
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="congratulationModule">
            <div class="modal-dialog" role="document" style="max-width: 80%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?= trans('messages.congr__title__form') ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-8 d-flex flex-column" style="height:100%">
                                    {{Form::open(array('files' => true, 'class' => 'congratulation_ajax')) }}
                                    <div class="item-form-congratulation">
                                        {{ Form::label('title', 'Заголовок') }}
                                        {{ Form::text('title','',['class' => 'form-control']) }}
                                    </div>
                                    <div class="item-form-congratulation">
                                        {{ Form::label('content', 'Сыылка на видео') }}
                                        {{ Form::text('content','',['class' => 'form-control item-form-news-add link-video','placeholder' => 'Вставьте ссылку на видео.']) }}
                                    </div>

                                    {{  Form::hidden('date','1',  null, ['class' => 'form-control' ]) }}
                                    {{ Form::hidden('priority', '5',['class' => 'form-control item-form-news-add']) }}
                                    <div class="item-form-congratulation input-group col-xl-6 item-form-news-add">
                                        <div class="custom-file">
                                            {{ Form::file('file', ['class' => 'form-control','area-describedby' => 'photo_area','id' => 'photo-main'])}}
                                            <label class="custom-file-label" for="photo-main"><?= trans('messages.upload__main__photo') ?></label>
                                        </div>
                                    </div>
                                    <div class="item-form-congratulation input-group col-xl-6 item-form-news-add">
                                        <div class="custom-file">
                                            {{ Form::file('photos[]', ['class' => 'form-control','area-describedby' => 'photo2_area','id' => 'photo', 'multiple' => 'multiple'])}}
                                            <label class="custom-file-label" for="photo"><?= trans('messages.upload__mult__photo__btn') ?></label>
                                        </div>
                                    </div>
                                    {{ Form::submit('Сохранить', ['class' => 'btn btn-raised btn-primary']) }}
                                </div>
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= trans('messages.news__close__btn') ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('script')
    <script src="{{asset('js/congratulations.js')}}"></script>
    <script>
        $(document).ready( function() {
            $('#btn-download-congratulations-page').click( function(e) {
                e.preventDefault();
                let data = $('.item-congratulations').length;
                $.ajax({
                    url: "<?= App::getLocale() == 'en' ? url('congratulations/en/add_congratulations') : url('congratulations/add_congratulations') ?>/" + data,
                    dataType: 'json',
                    type: 'get',
                    success: function(d) {
                        console.log(d);
                        if (d === 0) {
                            return false;
                        }
                        d.forEach(function (el) {
                            console.log(el.content);
                            let ing = '<div class="item-congratulations">';
                            if (!(el.content.match(/<iframe/))) {
                                ing += '<img class="img-item-congratulations img-thumbnail" src="' + el.content + '" alt="" />';
                            } else {
                                ing += '<div class="img-item-congratulations">' + el.content + '</div>';
                            }
                            ing += '<div class="content-item-congratulations">' +
                                '<span class="title-item-congratulations">' + el.title + '<br /></span>' +
                                '</div></div>';
                            $('#congratulations_wrapper').append(ing);
                        });

                        let params;
                        $('.item-congratulations > img').click(function () {
                            if(window.innerHeight > window.innerWidth) {
                                params = window.innerWidth *82/100
                            } else {
                                params = window.innerHeight *82/100;
                            }
                            $('.layout-img').removeClass('hide');
                            $('.layout-img > div > a > img').attr('src', $(this).attr('src'));
                            $('.layout-img > div > a').attr('href', $(this).attr('src'));
                            $('.layout-img > div > a').css({'z-index':'111111'});
                            $('.layout-img > .img-source-layout').css({'margin-top': $(window).scrollTop() + 120});
                            if(window.innerHeight > window.innerWidth) {
                                console.log(params)
                                $('.layout-img > .img-source-layout > a > img').css({"width": params * 82 / 100});
                            } else {
                                $('.layout-img > .img-source-layout > a > img').css({"height": params * 82 / 100});
                            }
                            console.log('window-height',window.innerHeight);
                        });

                        $(document).mousedown(function (e) {
                            let divImg = $('.layout-img > .img-source-layout > a');
                            if (!$(e.target).closest(divImg).length) {
                                $('.layout-img').addClass('hide');
                            }
                        });
                    }
                });
            });
        });
    </script>
    <script src="{{asset('js/congratulation_form.js')}}"></script>
    <script src="{{asset('js/locations.js')}}"></script>
@endsection