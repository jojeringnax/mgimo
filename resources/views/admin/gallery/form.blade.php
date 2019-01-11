
@extends('layouts.admin')
@section('content')
    <h1 class="text-center">РАЗДЕЛ: ГАЛЕРЕЯ</h1>
    <div class="container" style="margin-top:100px;">
        <div class="row d-flex justify-content-center">
            <div class="col-12 d-flex flex-column align-items-center">
                {{ !isset($album) ? Form::open(array('action' => 'AdminController@createAlbum', 'class'=>'album-form form-group')) : Form::model($album, ['class'=>'album-form form-group']) }}
                {{ Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Введите название альбома']) }}
                {{  Form::select('tags', \App\Congratulation::getDatesArray(),  null, ['class' => 'custom-select' ]) }}

                {{ Form::submit('Создать Альбом', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
