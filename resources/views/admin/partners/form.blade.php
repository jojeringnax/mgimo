
@extends('layouts.admin')
@section('content')
    <h1 class="text-center">РАЗДЕЛ: ПАРТНЕРЫ</h1>
    <div class="container" style="margin-top:100px;">
        <div class="row d-flex justify-content-center">
            <div class="col-12 d-flex flex-column align-items-center">
                {{ !isset($partner) ? Form::open(array('action' => 'AdminController@createPartner', 'files' => true, 'class'=>'partner-form d-flex flex-column align-items-center')) : Form::model($partner, ['files' => true, 'class'=>'partner-form d-flex flex-column align-items-center']) }}
                <div class="input-group col-xl-12 item-form-partner-add">
                    {{ Form::label('link', 'Ссылка') }}
                    {{ Form::text('link', isset($partner) ? $partner->link : '',['class' => 'form-control','placeholder' => 'Ссылка на сайт партнера']) }}
                </div>

                <div class="input-group col-xl-12 item-form-partner-add">

                    {{ Form::label('title', 'Название компании-партнера') }}
                    {{ Form::text('title', isset($partner) ? $partner->title : null,['class' => 'form-control','placeholder' => 'Название', 'id' => 'select-partner-title']) }}
                </div>


                <div class="input-group col-xl-12 item-form-partner-add">

                    {{ Form::label('position', 'Должность') }}
                    {{ Form::text('position', isset($partner) ? $partner->name : null,['class' => 'form-control','placeholder' => 'Должность', 'id' => 'select-partner-position']) }}
                </div>

                <div class="input-group col-xl-12 item-form-partner-add">

                    {{ Form::label('category', 'Категория') }}
                    {{ Form::select('category',[
                        \App\Partner::ORGANIZATORS => 'Организаторы',
                        \App\Partner::GENERAL_SPONSORS => 'Генеральные спонсоры',
                        \App\Partner::SPONSORS => 'Спонсоры',
                        \App\Partner::INFORM_PARTNERS => 'Информационные партнеры'
                    ], null, ['class' => 'custom-select']) }}
                </div>

                <div class="input-group col-xl-12 item-form-partner-add">

                    {{ Form::label('type', 'Тип партнера') }}
                    {{ Form::select('type',[
                        \App\Partner::TYPE_COMPANY => 'Компания',
                        \App\Partner::TYPE_INDIVIDUAL => 'Индивидуальный предприниматель',
                    ], null, ['class' => 'custom-select', 'id' => 'select-partner-type']) }}
                </div>

                {{ Form::number('priority', isset($partner) ? $partner->priority : '5',['class' => 'form-control hide','placeholder' => 'МГИМО лучший вуз в мире']) }}

                <div class="input-group col-xl-12 item-form-partner-add">
                    {{--<div class="input-group-prepend clear">--}}
                        {{--<span class="input-group-text" id="photo_area" data-file="главное">Upload</span>--}}
                    {{--</div>--}}
                    <div class="custom-file">
                        {{ Form::file('photo', ['class' => 'input-default-js logo-partner-file', 'area-describedby' => 'photo_area', 'id' => 'photo']) }}
                        <label class="custom-file-label" for="photo">Загрузите логотип партнера</label>
                    </div>
                </div>


                {{ Form::submit('Сохранить',['class' => 'btn btn-primary item-form-news-add-btn'] ) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.logo-partner-file').change(function () {
                $('.custom-file-label').html($(this).val());
            });

            $('#select-partner-type').change( function() {
               if ($(this).val() === 1) {
                   $('#select-partner-position').prop('disabled', false);
                   $('#select-partner-title').prop('disabled', false);
               } else {
                   $('#select-partner-position').prop('disabled', 'disabled');
                   $('#select-partner-title').prop('disabled', 'disabled');
               }
            });
        })
    </script>
@endsection