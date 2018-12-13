{{ !isset($partner) ? Form::open(array('action' => 'AdminController@createPartner', 'files' => true, 'class'=>'news-form')) : Form::model($partner, ['files' => true, 'class'=>'partner-form']) }}

{{ Form::label('link', 'Ссылка') }}
{{ Form::text('link', isset($partner) ? $partner->link : '',['class' => 'form-control item-form-news-add','placeholder' => 'МГИМО лучший вуз в мире']) }}


{{ Form::label('name', 'Имя партнера') }}
{{ Form::text('name', isset($partner) ? $partner->name : '',['class' => 'form-control item-form-news-add','placeholder' => 'МГИМО лучший вуз в мире']) }}

{{ Form::label('priority', 'Приоритет') }}
{{ Form::number('priority', isset($partner) ? $partner->priority : '5',['class' => 'form-control item-form-news-add','placeholder' => 'МГИМО лучший вуз в мире']) }}

<div class="input-group col-xl-5 item-form-news-add">
    <div class="input-group-prepend clear">
        <span class="input-group-text" id="photo_area" data-file="главное">Upload</span>
    </div>
    <div class="custom-file">
        {{ Form::file('photo', ['class' => 'input-default-js', 'area-describedby' => 'photo_area', 'id' => 'photo']) }}
        <label class="custom-file-label" for="photo">Загрузите первое фото</label>
    </div>
</div>


{{ Form::submit('Сохранить',['class' => 'btn btn-primary item-form-news-add-btn'] ) }}

{{ Form::close() }}