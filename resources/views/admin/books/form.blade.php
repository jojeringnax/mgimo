
{{ !isset($book) ? Form::open(array('action' => 'AdminController@createBook', 'files' => true)) : Form::model($book, ['files' => true]) }}

{{ Form::label('title', 'Название книги') }}
{{ Form::text('title', isset($book) ? $book->title : '',['class' => 'form-control']) }}
{{ Form::label('description', 'Описание') }}
{{ Form::textarea('description', isset($book) ? $book->description : '') }}
{{ Form::label('photo', 'Загрузите фото обложки') }}
{{ Form::file('photo', ['class' => 'form-control']) }}

@if(isset($book))

    @if($photo = $book->coverPhoto)
        <img src="{{$photo->path}}" />
    @endif
@endif

{{ Form::submit('Сохранить') }}


{{ Form::close() }}