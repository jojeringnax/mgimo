
{{ request()->route()->getActionMethod() !== 'updateArticle' ? Form::open(array('action' => 'AdminController@createArticle', 'files' => true)) : Form::model($article, ['files' => true]) }}

{{ Form::label('title', 'Заголовок') }}
    {{ Form::text('title', isset($article) ? $article->title : '',['class' => 'form-control']) }}
{{ Form::label('content', 'Текст статьи') }}
    {{ Form::textarea('content') }}
{{ Form::label('photo', 'Загрузите главное фото') }}
    {{ Form::file('photo', ['class' => 'form-control']) }}

{{ Form::label('photo1', 'Загрузите первое фото') }}
    {{ Form::file('photo1') }}

{{ Form::label('photo2', 'Загрузите второе фото') }}
    {{ Form::file('photo2') }}
{{ Form::label('photo3', 'Загрузите третье фото') }}
    {{ Form::file('photo3') }}

{{ Form::label('tags', 'Тэги') }}
    {{ Form::text('tags', isset($tags) ? implode(',', $tags) : '') }}

{{ Form::submit('Сохранить') }}


{{ Form::close() }}