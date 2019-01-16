@extends('layouts.admin')
@section('content')
    <h1 class="text-center">РАЗДЕЛ: СМИ О НАС</h1>
    <div class="container" style="margin-top:100px;">
        <div class="row d-flex  flex-column justify-content-center align-items-center">
            <div class="col-9">
                {{ !isset($smi) ? Form::open(array('action' => 'AdminController@createSmi')) : Form::model($smi) }}
                    {{ Form::label('title', 'Заголовок', ['class' => 'form-crate-smis']) }}
                    {{ Form::textarea('title', !isset($smi) ? '' : $smi->title, ['class' => 'item-form-smis form-control','required' => 'required']) }}

                    {{ Form::label('link_view', 'Отображение текста для ссылки', ['class' => 'label-inp-smis', 'id' => '']) }}
                    {{ Form::text('link_view', !isset($smi) ? '' : $smi->link_view, ['class' => 'item-form-smis form-control','required' => 'required']) }}

                    {{ Form::label('link', 'Ссылка', ['class' => 'label-inp-smis', 'id' => '']) }}
                    {{ Form::text('link', !isset($smi) ? '' : $smi->link, ['class' => 'item-form-smis form-control','required' => 'required']) }}

                    {{ Form::label('date', 'Дата', ['class' => 'label-inp-smis', 'id' => '']) }}
                    {{ Form::date('date', !isset($smi) ? '' : $smi->link, ['class' => 'item-form-smis form-control','required' => 'required']) }}

                    {{ Form::submit('Сохранить',['class' => 'item-form-smis-btn btn btn-raised btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

