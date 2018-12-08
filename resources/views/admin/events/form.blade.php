{{ request()->route()->getActionMethod() !== 'updateEvent' ? Form::open(array('action' => 'AdminController@createEvent')) : Form::model($event) }}

{{ Form::label('content', 'Заголовок') }}
    {{ Form::textarea('content') }}


{{ Form::label('date', 'Дата') }}
    {{ Form::date('date',  \Carbon\Carbon::now()) }}

{{ Form::label('tags', 'Тэги') }}
    {{ Form::text('tags') }}

{{ Form::label('main') }}
    {{ Form::checkbox('main') }}
{{ Form::submit('Сохранить') }}




{{ Form::close() }}