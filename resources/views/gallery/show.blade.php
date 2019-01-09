@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection

@extends('layout')
@section('color')
    background-color: white !important;
@endsection
@section('link')
    <link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">
@endsection
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection
@section('content')
    <div class="container" style="margin-top: 150px; padding-bottom: 120px;">
        <div class="row">
            <div class="album-names">
                {{$album->name}}
            </div>
            <div class="gallery-page d-flex flex-wrap list-unstyled">
                <div  id="lightgallery" class="items-partners d-flex col-12 flex-wrap" >
                @foreach($album->photos as $photo)
                    <div class="d-flex align-items-center justify-content-center" data-src="{{ $photo->path }}" style="cursor: pointer">
                        <img src="{{ $photo->path }}" style="height: 120px; margin-top: 30px; margin-left: 30px;" alt="thumbnail" class="img-thumbnail"/>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src={{asset('js/photo-gallery/lightgallery.min.js')}}></script>
    <script src={{asset('js/photo-gallery/lg-pager.min.js')}}></script>
    <script src={{asset('js/photo-gallery/lg-share.min.js')}}></script>
    <script src={{asset('js/photo-gallery/lg-thumbnail.min.js')}}></script>
    <script src={{asset('js/photo-gallery/lg-video.min.js')}}></script>
    <script src={{asset('js/photo-gallery/lg-zoom.min.js')}}></script>
    <script src={{asset('js/photo-gallery/lg-hash.min.js')}}></script>
    <script src={{asset('js/photo-gallery/lg-autoplay.min.js')}}></script>
    <script>
        lightGallery(document.getElementById('lightgallery'));
    </script>
    <script src="{{asset('js/locations.js')}}"></script>
@endsection