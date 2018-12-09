
{{ !isset($article) ? Form::open(array('action' => 'AdminController@createArticle', 'files' => true)) : Form::model($article, ['files' => true]) }}

{{ Form::label('title', 'Заголовок') }}
    {{ Form::text('title', isset($article) ? $article->title : '',['class' => 'form-control']) }}
{{ Form::label('content', 'Текст статьи') }}
    {{ Form::textarea('content', isset($article) ? $article->content : '') }}
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
@if(isset($article))
    @if(!$photos->isEmpty())
        <div style="display: flex;align-items: center; justify-content: space-around;">
            @foreach($photos as $photo)
                <div style="position: relative; width: 500px; height: 375px;">
                    <img src="{{ $photo->path }}" style="position: absolute; width: 100%;"/>
                    <a href="{{ action('PhotoController@delete', ['id' => $photo->id]) }}" style="width: 50px; height: 50px; position: absolute;right:10px;top:10px;font-size: 50px;color: white;">X</a>
                </div>
            @endforeach
        </div>
    @endif
    @if($photo = $article->mainPhoto)
        <img src="{{$photo->path}}" />
    @endif
@endif
{{ Form::submit('Сохранить') }}


{{ Form::close() }}