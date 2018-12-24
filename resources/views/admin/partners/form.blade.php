
@extends('layouts.admin')
@section('content')
    <div class="container" style="margin-top:100px;">
        <div class="row d-flex justify-content-center">
            <div class="col-12 d-flex flex-column align-items-center">
                {{ !isset($partner) ? Form::open(array('action' => 'AdminController@createPartner', 'files' => true, 'class'=>'news-form')) : Form::model($partner, ['files' => true, 'class'=>'partner-form']) }}

                {{ Form::label('link', 'Ссылка') }}
                {{ Form::text('link', isset($partner) ? $partner->link : '',['class' => 'form-control item-form-news-add','placeholder' => 'МГИМО лучший вуз в мире']) }}


                {{ Form::label('name', 'Имя партнера') }}
                {{ Form::text('name', isset($partner) ? $partner->name : '',['class' => 'form-control item-form-news-add','placeholder' => 'МГИМО лучший вуз в мире']) }}

                {{ Form::label('priority', 'Приоритет') }}
                {{ Form::number('priority', isset($partner) ? $partner->priority : '5',['class' => 'form-control item-form-news-add','placeholder' => 'МГИМО лучший вуз в мире']) }}

                <div class="input-group col-xl-12 item-form-news-add">
                    <div class="input-group-prepend clear">
                        <span class="input-group-text" id="photo_area" data-file="главное">Upload</span>
                    </div>
                    <div class="custom-file">
                        {{ Form::file('photo', ['class' => 'input-default-js', 'area-describedby' => 'photo_area', 'id' => 'photo']) }}
                        <label class="custom-file-label" for="photo">Загрузите логотип партнера</label>
                    </div>
                </div>


                {{ Form::submit('Сохранить',['class' => 'btn btn-primary item-form-news-add-btn'] ) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
