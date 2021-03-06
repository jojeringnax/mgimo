@extends('layouts.admin')
@section('link')
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    <h1 class="text-center">РАЗДЕЛ: КНИГИ</h1>
<div class="container">
    <div class="row">
        <div class="form-book col-12 d-flex justify-content-center">
            {{ !isset($book) ? Form::open(array('action' => 'en\AdminController@createBook', 'files' => true, 'class'=>'book-form col-xl-8')) : Form::model($book, ['files' => true, 'class'=>'book-form col-xl-8']) }}
            <div class="item-book-admin col-xl-12">
                {{ Form::label('title', 'Название книги') }}
                {{ Form::text('title', isset($book) ? $book->title : '',['class' => 'form-control']) }}
            </div>
            <div class="col-xl-12 item-book-admin">
                Текст
                <div id="editor">
                    {!! isset($book) ? html_entity_decode($book->description) : '' !!}
                </div>
                <input type="hidden" name="description" id="description"/>
            </div>
            <div class="col-xl-12 item-book-admin">
                {{Form::select('status',['0' => 'Ожидается', '1' => 'Активна'],null,['class' => 'custom-select'])}}
            </div>
            <div class="col-xl-12 item-book-admin">
                {{ Form::label('link', '','Ссылка на книгу') }}
                {{ Form::text('link', isset($book) ? $book->link : '', ['class' => 'form-control', 'required']) }}
            </div>
            {{ Form::hidden('price','1', ['class' => 'form-control']) }}

            <div class="input-group col-xl-12 item-book-admin">
                {{--<div class="input-group-prepend clear">--}}
                    {{--<span class="input-group-text" id="photo_area" data-file="третье">Upload</span>--}}
                {{--</div>--}}
                <div class="custom-file ">
                    {{ Form::file('photo', ['class' => 'input-default-js', 'area-describedby' => 'photo_area', 'id' => 'photo'])}}
                    <label class="custom-file-label" for="photo">Загрузите фото обложки</label>
                </div>
            </div>

            <div class="col-12 images-admin card">
                <div class="card col-3">
                    <div class="card-head">
                        @if(isset($book))
                            @if($photo = $book->coverPhoto)
                                <img src="{{$photo->path}}" style="width:100%"/>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            {{ Form::submit('Сохранить',['class' => 'btn btn-primary']) }}

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
    <script src="{{asset('js/book.js')}}"></script>
@endsection