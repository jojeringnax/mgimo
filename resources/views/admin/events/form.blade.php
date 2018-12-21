@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8 d-flex flex-column">
                {{ request()->route()->getActionMethod() !== 'updateEvent' ? Form::open(array('action' => 'AdminController@createEvent')) : Form::model($event) }}
                {{ Form::label('title', 'Местоположение') }}
                {{ Form::text('title', !isset($event) ? '' : $event->title, ['class' => 'form-control']) }}
                <div class="item-form-event">
                    {{ Form::label('content', 'Заголовок') }}
                    {{ Form::textarea('content', !isset($event) ? '' : $event->content, ['class' => 'form-control']) }}
                </div>
                <div class="item-form-event">
                    {{ Form::label('date', 'Дата') }}
                    {{ Form::date('date',  !isset($event) ? \Carbon\Carbon::now() : $event->date, ['class' => 'form-control datepicker']) }}
                </div>
                <div class="item-form-event">
                    {{ Form::label('tags', 'Тэги') }}
                    {{ Form::text('tags', !isset($event) ? '' : implode(',', $event->getTags()), ['class' => 'form-control']) }}
                </div>
                <div class="item-form-event">
                    {{ Form::label('location', 'Местоположение') }}
                    {{ Form::text('location', !isset($event) ? '' : $event->location, ['class' => 'form-control']) }}
                </div>
                <div class="item-form-event custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="main">
                    <label class="custom-control-label" for="main">Main</label>
                </div>
                {{--{{ Form::label('main') }}--}}
                {{--{{ Form::checkbox('main') }}--}}

                {{ Form::submit('Сохранить',['class' => 'item-form-event-btn btn btn-raised btn-primary']) }}

                {{ Form::close() }}
            </div>

        </div>
    </div>

@endsection