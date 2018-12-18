@extends('layout')
@section('link')
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container" style="margin-top: 100px; padding-bottom: 120px">
        <div class="row d-flex flex-column">
            <div class="news-page">
                <div class="title-news-page d-flex">
                    <span class="text-title-news-page">Новости</span>
                    <div class="btn-news-page d-flex">
                        <a  class="btn-news-page-add"><span></span>Добавить свою новость</a>
                        <a  class="btn-news-page-sub"><span></span>Подписаться на новости</a>
                    </div>
                </div>
                <div class="news d-flex flex-wrap justify-content-start">
                    {{--<div class="col-xl-4 d-flex flex-column">--}}

                    {{--</div>--}}
                    {{--<div class="col-xl-4 d-flex flex-column">--}}

                    {{--</div>--}}
                    {{--<div class="col-xl-4 d-flex flex-column">--}}

                    {{--</div>--}}
                    @foreach($news as $article)
                        @if($loop->first)
                            <div class="col-xl-12 d-flex flex-column flex-wrap" style="max-height: 1400px;">
                                <div class="item-card-news card">
                                    <img class="card-img-top" src="{{ $article->mainPhoto->path }}" alt="Card image cap">
                                    <div class="card-body">
                                        <span class="title-card-news">{{ $article->title }}</span>
                                        <p class="card-text">{!! mb_strimwidth(strip_tags($article->content), 0, 200, '...')!!}</p>
                                    </div>
                                    {{ link_to('news/show/'.$article->id, 'Читать', ['class' => 'card-link news-show-link']) }}
                                </div>
                        @elseif($loop->index == 1)
                                <div class="item-card-news card">
                                    <img class="card-img-top" src="{{ $article->mainPhoto->path }}" alt="Card image cap">
                                    <div class="card-body">
                                        <span class="title-card-news">{{ $article->title }}</span>
                                        <p class="card-text">{!! mb_strimwidth(strip_tags($article->content), 0, 200, '...')!!}</p>
                                    </div>
                                    {{ link_to('news/show/'.$article->id, 'Читать', ['class' => 'card-link news-show-link']) }}
                                </div>
                        @elseif($loop->index == 2)
                                <div class="item-card-news card">
                                    <img class="card-img-top" src="{{ $article->mainPhoto->path }}" alt="Card image cap">
                                    <div class="card-body">
                                        <span class="title-card-news">{{ $article->title }}</span>
                                        <p class="card-text">{!! mb_strimwidth(strip_tags($article->content), 0, 200, '...')!!}</p>
                                    </div>
                                    {{ link_to('news/show/'.$article->id, 'Читать', ['class' => 'card-link news-show-link']) }}
                                </div>
                        @elseif($loop->last)
                            <div class="item-card-news card">
                                <img class="card-img-top" src="{{ $article->mainPhoto->path }}" alt="Card image cap">
                                <div class="card-body">
                                    <span class="title-card-news">{{ $article->title }}</span>
                                    <p class="card-text">{!! mb_strimwidth(strip_tags($article->content), 0, 200, '...')!!}</p>
                                </div>
                                {{ link_to('news/show/'.$article->id, 'Читать', ['class' => 'card-link news-show-link']) }}
                            </div>
                            </div>

                        @endif

                    @endforeach
                </div>
                <div class="container" style="margin-top:120px;">
                    <div class="row d-flex justify-content-center">
                        <a id="btn-download-news-page" class="">Показать еще новости</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="modal-button btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>

    <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document" style="max-width: 80%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавьте свою новость</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-9">
                                {{ Form::open(array('action' => 'AdminController@createArticle', 'files' => true, 'class'=>'news-form')) }}

                                {{ Form::label('title', 'Заголовок') }}
                                {{ Form::text('title', '',['class' => 'form-control item-form-news-add','placeholder' => 'МГИМО лучший вуз в мире']) }}

                                <div id="editor" class="col-12 item-form-news-add"></div>
                                <input type="hidden" name="content" id="content-news"/>

                                <div class="d-flex col-12 flex-wrap item-form-news-add justify-content-between" style="margin-top: 25px">
                                    <div class="input-group col-xl-5 item-form-news-add">
                                        <div class="input-group-prepend clear">
                                            <span class="input-group-text" id="photo_area" data-file="главное">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            {{ Form::file('photo', ['class' => 'input-default-js', 'area-describedby' => 'photo_area', 'id' => 'photo']) }}
                                            <label class="custom-file-label" for="photo">Загрузите первое фото</label>
                                        </div>
                                    </div>

                                    <div class="input-group col-xl-5 item-form-news-add">
                                        <div class="input-group-prepend clear">
                                            <span class="input-group-text" id="photo1_area" data-file="первое">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            {{ Form::file('photo1', ['class' => 'input-default-js', 'area-describedby' => 'photo1_area', 'id' => 'photo1']) }}
                                            <label class="custom-file-label" for="photo1">Загрузите первое фото</label>
                                        </div>
                                    </div>
                                    <div class="input-group col-xl-5 item-form-news-add">
                                        <div class="input-group-prepend clear">
                                            <span class="input-group-text" id="photo2_area" data-file="второе">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            {{ Form::file('photo2', ['class' => 'input-default-js', 'area-describedby' => 'photo2_area', 'id' => 'photo2']) }}
                                            <label class="custom-file-label" for="photo2">Загрузите второе фото</label>
                                        </div>
                                    </div>
                                    <div class="input-group col-xl-5 item-form-news-add">
                                        <div class="input-group-prepend clear">
                                            <span class="input-group-text" id="photo3_area" data-file="третье">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            {{ Form::file('photo3', ['class' => 'input-default-js', 'area-describedby' => 'photo3_area', 'id' => 'photo3'])}}
                                            <label class="custom-file-label" for="photo3">Загрузите третье фото</label>
                                        </div>
                                    </div>
                                </div>


                                {{ Form::label('tags', 'Тэги') }}
                                {{ Form::text('tags', isset($tags) ? implode(',', $tags) : '',['class' => 'form-control item-form-news-add','placeholder' => 'Культура'] ) }}

                                {{ Form::submit('Сохранить',['class' => 'btn btn-primary item-form-news-add-btn'] ) }}


                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
    <script src="{{asset('js/news.js')}}"></script>
    <script src="{{ asset('js/news.js') }}"></script>
    <script>
        $(document).ready( function() {
           $('.news-form').submit( function(e) {
               e.preventDefault();
               $.ajax({
                   url: "{{ url('admin/news/create') }}",
                   dataType: 'json',
                   data: new FormData($(this)[0]),
                   type: 'POST',
                   async: false,
                   cache:false,
                   contentType: false,
                   processData: false,
                   error: function(data) {
                        $('.modal-body > .container > .row').html('Новость не загружена, попробуйте снова');
                   },
                   success: function(data) {
                       $('.modal-body > .container > .row').html('Новость успешно загружена');
                       $('.modal-button').attr('data-target', '#').html('hshfdh');
                   }
               });
            });
        });
    </script>

@endsection