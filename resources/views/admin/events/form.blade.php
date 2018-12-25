@extends('layouts.admin')

@section('link')
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8 d-flex flex-column">
                {{ request()->route()->getActionMethod() !== 'updateEvent' ? Form::open(array('action' => 'AdminController@createEvent', 'class'=>'event-form', 'files' => true)) : Form::model($event, ['class'=>'event-form', 'files' => true]) }}
                {{ Form::label('title', 'Заколовок') }}
                {{ Form::text('title', !isset($event) ? '' : $event->title, ['class' => 'form-control']) }}
                <div class="item-form-event">
                    <div id="editor" class="col-12 item-form-news-add">
                        {!! isset($event) ? html_entity_decode($event->content) : '' !!}
                    </div>
                    <input type="hidden" name="content" id="content-event"/>
        {{--            {{ Form::label('content', 'Заголовок') }}
                    {{ Form::textarea('content', !isset($event) ? '' : $event->content, ['class' => 'form-control']) }}--}}
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
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        {{ Form::file('photos', ['class' => 'input-default-js custom-file-input', 'area-describedby' => 'photo_area', 'id' => 'photo', 'multiple' => 'multiple']) }}
                        {{--<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">--}}
                        <label class="custom-file-label" for="inputGroupFile01">Choose files</label>
                    </div>
                </div>
                {{--{{ Form::label('main') }}--}}
                {{--{{ Form::checkbox('main') }}--}}

                {{ Form::submit('Сохранить',['class' => 'item-form-event-btn btn btn-raised btn-primary']) }}

                {{ Form::close() }}
            </div>

        </div>
    </div>

@endsection
@section('script')
    <script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
    <script src="{{asset('js/event-page.js')}}"></script>
@endsection