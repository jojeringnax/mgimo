
{{ Form::open(array('action' => 'AdminController@createSmi')) }}

{{ Form::label('title', 'Заголовок') }}
    {{ Form::textarea('title') }}

{{ Form::label('link_view'), 'Отображение текста для ссылки' }}
    {{ Form::text('link_view') }}

{{ Form::label('link'), 'Ссылка' }}
    {{ Form::text('link') }}
{{ Form::submit('Сохранить') }}



{{ Form::close() }}