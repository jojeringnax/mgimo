
{{ Form::open(array('action' => 'AdminController@createArticle', 'files' => true)) }}

{{ Form::label('title', 'Заголовок') }}
    {{ Form::text('title') }}
{{ Form::label('content', 'Текст статьи') }}
    {{ Form::textarea('content') }}
{{ Form::label('photo', 'Загрузите главное фото') }}
    {{ Form::file('photo') }}

{{ Form::label('photo1', 'Загрузите первое фото') }}
    {{ Form::file('photo1') }}

{{ Form::label('photo2', 'Загрузите второе фото') }}
    {{ Form::file('photo2') }}
{{ Form::label('photo3', 'Загрузите третье фото') }}
    {{ Form::file('photo3') }}

{{ Form::label('tags', 'Тэги') }}
    {{ Form::text('tags') }}

{{ Form::submit('Сохранить') }}



{{ Form::close() }}