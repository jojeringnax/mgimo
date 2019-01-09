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
            <img src="" alt="">
        </div>
    </div>
    <div id="congratulations" class="container" style="padding-bottom: 100px; margin-top: 80px;">
        <div class="row" style="margin:0; padding: 0">
            <div class="btns-congratulations d-flex justify-content-xl-start justify-content-sm-center">
                <a href=""data-toggle="modal" data-target="#congratulationModule" class="btn-congr"><span class="congr_icon"></span>Поздравить МГИМО</a>
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
                @if(count($congratulations) > 4)
                    <div class="d-flex justify-content-center" style="width: 100%; margin-top: 100px;">
                        <a id="btn-download-congratulations-page" href="">ПОКАЗАТЬ ЕЩЕ ПОЗДРАВЛЕНИЯ</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="congratulationModule">
            <div class="modal-dialog" role="document" style="max-width: 80%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Заполните форму поздравления</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-8 d-flex flex-column" style="height:100%">
                                    {{Form::open(array('action' => 'AdminController@createCongratulation', 'files' => true, 'class' => 'congratulation_ajax')) }}
                                    <div class="item-form-congratulation">
                                        {{ Form::label('title', 'Заголовок') }}
                                        {{ Form::text('title','',['class' => 'form-control']) }}
                                    </div>
                                    <div class="item-form-congratulation">
                                        {{ Form::label('content', 'Сыылка на видео') }}
                                        {{ Form::text('content','',['class' => 'form-control item-form-news-add','placeholder' => 'Вставьте ссылку на видео.']) }}
                                    </div>

                                    {{  Form::hidden('date','1',  null, ['class' => 'form-control' ]) }}
                                    <div class="item-form-congratulation">
                                        {{ Form::label('priority', 'Приоритет') }}
                                        {{ Form::number('priority', '1',['class' => 'form-control item-form-news-add']) }}
                                    </div>
                                    <div class="item-form-congratulation input-group col-xl-6 item-form-news-add">
                                        <div class="custom-file">
                                            {{ Form::file('file', ['class' => 'form-control','area-describedby' => 'photo_area','id' => 'photo-main'])}}
                                            <label class="custom-file-label" for="photo-main">Загрузите основное фото</label>
                                        </div>
                                    </div>
                                    <div class="item-form-congratulation input-group col-xl-6 item-form-news-add">
                                        <div class="custom-file">
                                            {{ Form::file('photos[]', ['class' => 'form-control','area-describedby' => 'photo2_area','id' => 'photo', 'multiple' => 'multiple'])}}
                                            <label class="custom-file-label" for="photo">Загрузите фото или видео</label>
                                        </div>
                                    </div>
                                    {{ Form::submit('Сохранить', ['class' => 'btn btn-raised btn-primary']) }}
                                </div>
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    url: "{{ url('congratulations/add_congratulations') }}/" + data,
                    dataType: 'json',
                    type: 'get',
                    success: function(d) {
                        console.log(d);
                        if (d === 0) {
                            return false;
                        }
                        d.forEach(function (el) {
                            let ing = '<div class="item-congratulations">';
                            if (el.content) {
                                ing += '<img class="img-item-congratulations img-thumbnail" src="' + el.content + '" alt="" />';
                            } else {
                                ing += '<div class="img-item-congratulations">' + el.content + '</div>';
                            }
                            ing += '<div class="content-item-congratulations">' +
                                '<span class="title-item-congratulations">' + el.title + '<br /></span>' +
                                '</div></div>';
                            $('#congratulations_wrapper').append(ing);
                        });
                    }
                });
            });
        });
    </script>
    <script src="{{asset('js/locations.js')}}"></script>
@endsection