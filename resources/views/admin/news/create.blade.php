
{{ Form::open(array('action' => 'AdminController@createNews', 'files' => true)) }}

{{ Form::label('title', 'Заголовок') }}
    {{ Form::text('title') }}
{{ Form::label('content', 'Текст статьи') }}
    {{ Form::textarea('content') }}
{{ Form::label('photo', 'Загрузите главное фото') }}
    {{ Form::file('photo') }}

{{ Form::submit('Сохранить') }}

{{ Form::close() }}