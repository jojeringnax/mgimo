
{{ !isset($congratulation) ? Form::open(array('action' => 'AdminController@createCongratulation', 'files' => true)) : Form::model($congratulation, ['files' => true]) }}

{{ Form::label('title', 'Заголовок') }}
{{ Form::text('title', isset($congratulation) ? $congratulation->title : '',['class' => 'form-control']) }}

{{ Form::label('content', 'Текст поздравления') }}
{{ Form::textarea('content', isset($congratulation) ? $congratulation->content : '') }}

{{ Form::label('date', 'Выберите дату') }}
{{ Form::select('date', \App\Congratulation::getDatesArray()) }}

{{ Form::label('file', 'Загрузите фото или видео') }}
{{ Form::file('file', ['class' => 'form-control']) }}


@if(isset($congratulation))
    @if($photo = $article->mainPhoto)
        <img src="{{$photo->path}}" />
    @endif
@endif
{{ Form::submit('Сохранить') }}


{{ Form::close() }}