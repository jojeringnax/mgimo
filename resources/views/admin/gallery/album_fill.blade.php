
@extends('layouts.admin')

@section('link')
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
@endsection
@section('content')
    <div class="forms-albums container">
        {{ Form::model($album, ['class'=>'album-form form-group', 'files' => true]) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                {{ Form::file('photos[]', ['class' => 'input-default-js custom-file-input', 'area-describedby' => 'photo_area', 'id' => 'photo', 'multiple' => 'multiple']) }}
                {{--<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">--}}
                <label class="custom-file-label" for="inputGroupFile01">Choose files</label>
            </div>
        </div>

        {{ Form::submit('Что-то сделать!', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>

    @php
        $photos = $album->photos;
    @endphp
    <div class="container" style="margin-top: 140px;">
        <div class="row">
            {{ Form::open(array('action' => 'AdminController@createArticle', 'files' => true, 'class'=>'form-control album-delete-photos')) }}
                <div class="photo-albums d-flex flex-wrap">
                        @foreach( $photos as $photo)
                            <div class="col-2">
                                <div class="item-album-photo img-thumbnail">
                                    <div class="check-box-delete-item custom-control custom-checkbox custom-control-inline">
                                        {{ Form::checkbox($photo->id,null,null, ['class' => 'custom-control-input', 'id' => $photo->id]) }}
                                        <label class="custom-control-label" for="{{$photo->id}}"></label>
                                    </div>
                                    <div class="img img-thumbnail">
                                        <img src="{{$photo->path}}" alt="" width="100%">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    <div class="col-12 d-flex justify-content-lg-center">
                        {{ Form::submit('Удалить',['class' => 'btn btn-primary item-form-news-add-btn'] ) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
@section('script')

@endsection
