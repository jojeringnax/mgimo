@extends('layout')

@section('link')
@endsection
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection
@section('content')
    <div class="container" style="margin-top: 150px; padding-bottom: 120px;">
        <div class="row">
            <div class="gallery-page d-flex flex-wrap">
                {{--<div class="title-gallery-page">--}}
                    {{--<span>Галлерея</span>--}}
                {{--</div>--}}

                <div class="d-flex col-12 flex-wrap">
                    @foreach($albums as $album)
                        @php
                            $photos = $album->photos;
                        @endphp
                        @foreach($photos as $photo)
                            <a class="col-3" href="{{ url('gallery/show', ['id' => $album->id]) }}">
                                <div  style="background-image: url({{ $photo->path }}); background-size: cover;">
                                    <div class="items-gallery">
                                        <div class="layout-partner-page">

                                        </div>
                                        <span>{{ $album->name }}</span>
                                    </div>
                                </div>
                            </a>
                            @php break; @endphp
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection