@extends('layouts.admin')

@section('link')
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
@endsection
@section('content')
    <h1 class="text-center">РАЗДЕЛ: НОВОСТИ</h1>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-9">
                {{ !isset($article) ? Form::open(array('action' => 'AdminController@createArticle', 'files' => true, 'class'=>'news-form')) : Form::model($article, ['files' => true, 'class'=>'news-form']) }}

                {{ Form::label('title', 'Заголовок') }}
                {{ Form::text('title', isset($article) ? $article->title : '',['class' => 'form-control item-form-news-add','placeholder' => 'МГИМО лучший вуз в мире']) }}

                {{ Form::label('moderated', 'Активна') }}
                {{ Form::checkbox('moderated', isset($article) ? $article->moderated : true) }}
                <div id="editor" class="col-12 item-form-news-add">
                    {!! isset($article) ? html_entity_decode($article->content) : '' !!}
                </div>
                <input type="hidden" name="content" id="content-news"/>

                <div class="d-flex col-12 flex-wrap item-form-news-add justify-content-between" style="margin-top: 25px">
                    <div class="input-group col-xl-5 item-form-news-add">
                        <div class="input-group-prepend clear">
                            <span class="input-group-text" id="photo_area" data-file=""></span>
                        </div>
                        <div class="custom-file">
                            {{ Form::file('photo', ['class' => 'input-default-js', 'area-describedby' => 'photo_area', 'id' => 'photo']) }}
                            <label class="custom-file-label" for="photo">Загрузите первое фото</label>
                        </div>
                    </div>

                    <div class="input-group col-xl-5 item-form-news-add">
                        <div class="input-group-prepend clear">
                            <span class="input-group-text" id="photo1_area" data-file=""></span>
                        </div>
                        <div class="custom-file">
                            {{ Form::file('photo1', ['class' => 'input-default-js', 'area-describedby' => 'photo1_area', 'id' => 'photo1']) }}
                            <label class="custom-file-label" for="photo1">Загрузите первое фото</label>
                        </div>
                    </div>
                    <div class="input-group col-xl-5 item-form-news-add">
                        <div class="input-group-prepend clear">
                            <span class="input-group-text" id="photo2_area" data-file=""></span>
                        </div>
                        <div class="custom-file">
                            {{ Form::file('photo2', ['class' => 'input-default-js', 'area-describedby' => 'photo2_area', 'id' => 'photo2']) }}
                            <label class="custom-file-label" for="photo2">Загрузите второе фото</label>
                        </div>
                    </div>
                    <div class="input-group col-xl-5 item-form-news-add">
                        <div class="input-group-prepend clear">
                            <span class="input-group-text" id="photo3_area" data-file=""></span>
                        </div>
                        <div class="custom-file">
                            {{ Form::file('photo3', ['class' => 'input-default-js', 'area-describedby' => 'photo3_area', 'id' => 'photo3'])}}
                            <label class="custom-file-label" for="photo3">Загрузите третье фото</label>
                        </div>
                    </div>
                </div>


                {{ Form::label('tags', 'Тэги') }}
                {{Form::select('tags',['СПОРТ' => 'СПОРТ','ИСКУССТВО' => 'ИСКУССТВО','НАУКА' => 'НАУКА','ОБРАЗОВАНИЕ' => 'ОБРАЗОВАНИЕ','МЕЖДУНАРОДНЫЕ СВЯЗИ' => 'МЕЖДУНАРОДНЫЕ СВЯЗИ','ВСТРЕЧИ ВЫПУСКНИКОВ' => 'ВСТРЕЧИ ВЫПУСКНИКОВ','КОНЦЕРТЫ' => 'КОНЦЕРТЫ','ЮБИЛЕИ' => 'ЮБИЛЕИ','ПРЕЗЕНТАЦИИ' => 'ПРЕЗЕНТАЦИИ','ИЗДАНИЯ' =>'ИЗДАНИЯ','ПАРТНЕРЫ' =>'ПАРТНЕРЫ' ],null,['class' => 'custom-select'])}}
                {{--{{ Form::text('tags', isset($tags) ? implode(',', $tags) : '',['class' => 'form-control item-form-news-add','placeholder' => 'Культура'] ) }}--}}
                @if(isset($article))
                    @if(!$photos->isEmpty())
                        <div style="display: flex;align-items: center; justify-content: space-around;">
                            @foreach($photos as $photo)
                                <div style="position: relative; width: 500px; height: 375px;">
                                    <img src="{{ $photo->path }}" style="position: absolute; width: 100%;"/>
                                    <a href="{{ action('PhotoController@delete', ['id' => $photo->id, 'from' => 'news']) }}" style="width: 50px; height: 50px; position: absolute;right:10px;top:10px;font-size: 50px;color: white;">X</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if($photo = $article->mainPhoto)
                        <div class="col-12">
                            <div class="card col-3">
                                <div class="card-head">
                                    <img src="{{$photo->path}}" style="width:100%"/>
                                </div>
                            </div>
                        </div>

                    @endif
                @endif
                {{ Form::submit('Сохранить',['class' => 'btn btn-primary item-form-news-add-btn'] ) }}


                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
    <script src="{{asset('js/news.js')}}"></script>
@endsection