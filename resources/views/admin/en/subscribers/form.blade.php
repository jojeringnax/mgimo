@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="form-sub col-8" style="margin: 0 auto;">
                {{ isset($subscriber) ? Form::model($subscriber) : Form::open(array('action' => 'en\AdminController@createSubscriber', 'class'=>'subscribe-form')) }}
                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input name="name" type="text" id="orangeForm-name" class="form-control validate" value="{{ isset($subscriber) ? $subscriber->name : '' }}" required>
                    <label data-error="Вы не ввели имя" data-success="Готово" for="orangeForm-name">*Ваше Имя</label>
                </div>
                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input name="email" type="email" id="sub_news-email" class="form-control validate" value="{{ isset($subscriber) ? $subscriber->email : '' }}" required>
                    <label data-error="Вы не ввели e-mail" data-success="right" for="orangeForm-email">*Ваш e-mail</label>
                </div>
                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input name="course" type="number" id="sub_news-course" class="form-control" value="{{ isset($subscriber) ? $subscriber->course : '' }}" required>
                    <label for="sub_news-course">Курс</label>
                </div>
                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input name="faculty" type="text" id="sub_news-faculty" class="form-control validate" value="{{ isset($subscriber) ? $subscriber->faculty : '' }}">
                    <label for="sub_news-faculty">Факультет</label>
                </div>
                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input name="work" type="text" id="sub_news-work" class="form-control validate" value="{{ isset($subscriber) ? $subscriber->work : '' }}">
                    <label for="sub_news-work">Место работы</label>
                </div>
                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input name="post" type="text" id="sub_news-post" class="form-control validate" value="{{ isset($subscriber) ? $subscriber->post : '' }}">
                    <label for="sub_news-post">Должность</label>
                </div>
                <div class="check-box-delete-item custom-control custom-checkbox custom-control-inline">
                    <input name="active" type="checkbox" class="custom-control-input form-control" id="sub_news-active" {{ isset($subscriber) && $subscriber->active ? 'checked' : '' }} />
                    <label class="sub_news-active custom-control-label" for="sub_news-active">Активировать</label>
                </div>
                <button class="btn  btn-rounded btn-primary">{{ isset($subscriber) ? 'Обновить' : 'Создать' }}</button>
                    {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection