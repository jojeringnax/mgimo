@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="form-tashkent-prog-create d-flex flex-column col-12 justify-content-center align-items-center border">
                {{ Form::model(\App\tashkent\en\Article::class,['class' => 'd-flex flex-column col-7']) }}
                <div class="item-form">
                    {{ Form::label('title', 'Заголовок') }}
                    {{ Form::text('title', $article->title,['class' => 'form-control']) }}
                </div>
                <div class="item-form">
                    {{ Form::label('link', 'Ссылка') }}
                    {{ Form::text('link', $article->link,['class' => 'form-control']) }}
                </div>
                {{ Form::submit('Сохранить',['class' => 'btn btn-primary']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection