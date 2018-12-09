@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{ !isset($smi) ? Form::open(array('action' => 'AdminController@createSmi')) : Form::model($smi) }}
                <div class="form-group bmd-form-group">
                    {{ Form::label('title', 'Заголовок', ['class' => 'form-crate-smis', 'id' => '']) }}
                    {{ Form::textarea('title', !isset($smi) ? '' : $smi->title, ['class' => 'item-form-smis form-control']) }}

                    {{ Form::label('link_view', 'Отображение текста для ссылки', ['class' => 'label-inp-smis', 'id' => '']) }}
                    {{ Form::text('link_view', !isset($smi) ? '' : $smi->link_view, ['class' => 'item-form-smis form-control']) }}

                    {{ Form::label('link', 'Ссылка', ['class' => 'label-inp-smis', 'id' => '']) }}
                    {{ Form::text('link', !isset($smi) ? '' : $smi->link, ['class' => 'item-form-smis form-control']) }}
                    {{ Form::submit('Сохранить',['class' => 'item-form-smis-btn btn btn-raised btn-primary']) }}

                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
