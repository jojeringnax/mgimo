@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8 d-flex flex-column" style="height:100%">
                {{ !isset($congratulation) ? Form::open(array('action' => 'AdminController@createCongratulation', 'files' => true)) : Form::model($congratulation, ['files' => true]) }}
                <div class="item-form-congratulation">
                    {{ Form::label('title', 'Заголовок') }}
                    {{ Form::text('title', isset($congratulation) ? $congratulation->title : '',['class' => 'form-control']) }}
                </div>
                    {{ Form::hidden('content','123',['class' => 'form-control']) }}
                    {{  Form::hidden('date','1',  null, ['class' => 'form-control' ]) }}
                <div class="item-form-congratulation">
                    {{ Form::label('priority', 'Приоритет') }}
                    {{ Form::number('priority', '1',['class' => 'form-control item-form-news-add','placeholder' => 'МГИМО лучший вуз в мире']) }}
                </div>
                <div class="item-form-congratulation input-group col-xl-6 item-form-news-add">
                    {{--<div class="input-group-prepend clear">--}}
                        {{--<span class="input-group-text" id="photo_area" data-file="второе">Upload</span>--}}
                    {{--</div>--}}
                    <div class="custom-file">
                        {{ Form::file('file', ['class' => 'form-control','area-describedby' => 'photo_area','id' => 'photo-main'])}}
                        <label class="custom-file-label" for="photo-main">Загрузите основное фото</label>
                    </div>
                </div>
                {{ Form::label('moderated') }}
                {{ Form::checkbox('moderated') }}

                <div class="item-form-congratulation input-group col-xl-6 item-form-news-add">
                    {{--<div class="input-group-prepend clear">--}}
                        {{--<span class="input-group-text" id="photo2_area" data-file="второе">Upload</span>--}}
                    {{--</div>--}}
                    <div class="custom-file">
                        {{ Form::file('photos[]', ['class' => 'form-control','area-describedby' => 'photo2_area','id' => 'photo', 'multiple' => 'multiple'])}}
                        <label class="custom-file-label" for="photo">Загрузите фото или видео</label>
                    </div>
                </div>
                @if(isset($congratulation))
                    @if(($photo = $congratulation->photo) !== null)
                        <div class="col-12">
                            <div class="card col-3">
                                <div class="card-head">
                                    <img src="{{$photo->path}}"  style="width: 100%"/>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
                {{ Form::submit('Сохранить', ['class' => 'btn btn-raised btn-primary']) }}
            </div>
        </div>
    </div>

    {{ Form::close() }}

@endsection
@section('script')
    <script src="{{asset('js/congratulation_form.js')}}"></script>
@endsection