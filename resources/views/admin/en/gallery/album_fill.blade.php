@php
    if( isset($album)) {
        $tags = $album->getTags();
        $myArray = \App\en\Congratulation::getDatesArray();
        if(!empty($tags)){
            $key = $tags[0];
            $myArray = array($key => $myArray[$key]) + $myArray;
        }

    }

@endphp
@extends('layouts.admin')

@section('link')
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
@endsection
@section('content')
    <h1 class="text-center">РАЗДЕЛ: ГАЛЕРЕЯ</h1>
    <div class="forms-albums container">
        {{ Form::model($album, ['class'=>'album-form form-group', 'files' => true]) }}
        {{ Form::text('name', !isset($album) ? '' : $album->name, ['class' => 'form-control col-xl-6', 'placeholder' => 'Введите название альбома']) }}
        {{  Form::select('tags', $myArray,  null, ['class' => 'custom-select col-xl-6' ]) }}
        <div class="input-group">
            <div class="custom-file">
                {{ Form::file('photos[]', ['class' => 'input-default-js custom-file-input', 'area-describedby' => 'photo_area', 'id' => 'photo', 'multiple' => 'multiple']) }}
                <label class="custom-file-label" for="inputGroupFile01">Choose files</label>
            </div>
        </div>

        {{ Form::submit('Обновить', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>


    @php
        $photos = $album->photos;
    @endphp
    <div class="container" style="margin-top: 140px;">
        <div class="row">
            {{ Form::open(array( 'files' => true, 'class'=>'form-control album-delete-photos')) }}
                <div class="photo-albums d-flex flex-wrap">
                        @foreach( $photos as $photo)
                            <div class="col-2" data-id="{{ $photo->id }}">
                                <div class="item-album-photo img-thumbnail">
                                    <div class="check-box-delete-item custom-control custom-checkbox custom-control-inline">
                                        {{ Form::checkbox($photo->id,null,null, ['class' => 'custom-control-input chekk', 'id' => $photo->id]) }}
                                        <label class="custom-control-label" for="{{$photo->id}}"></label>
                                    </div>
                                    <div class="img img-thumbnail">
                                        <img src="{{$photo->path}}" alt="" width="100%">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    <div class="col-12 d-flex justify-content-lg-center">
                        {{ Form::submit('Удалить',['class' => 'btn btn-primary delete-photos'] ) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            let data = [];
            $('.delete-photos').click(function(e){
                e.preventDefault();
                $('.chekk').each(function(){
                    if($(this).prop("checked")) {
                        data.push(parseInt(($(this).attr('id'))));
                    }
                });
                console.log(data);
               $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token()}}'
                    },
                    url: '{{url('admin/en/gallery/deletePhotos')}}',
                    method: 'post',
                    data: {data: data},
                    dataType: "text",
                    success: function() {
                        data.forEach(function(el) {
                            $('.col-2[data-id=' + el + ']').remove();
                        });
                    },
                    error: function(ut) {
                        console.log(ut);
                    }
               })
            });

            $('.custom-file-input').change(function(){
                $('.custom-file-label').html('Количество загруженных фото: ' + this.files.length)
            })
        });
    </script>
@endsection
