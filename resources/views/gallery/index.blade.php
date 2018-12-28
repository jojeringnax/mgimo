@extends('layout')

@section('link')
@endsection
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection
@section('color')
    background-color: white !important;
@endsection
@section('content')
    <div class="container" style="margin-top: 150px; padding-bottom: 120px;">
        <div class="row">
            <div class="gallery-page d-flex flex-wrap">
                <div class="d-flex col-12 flex-wrap">
                    @foreach($albums as $album)
                        @php
                            $photos = $album->photos;
                        @endphp
                        @foreach($photos as $photo)
                            <a class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 item-album" href="{{ url('gallery/show', ['id' => $album->id]) }}">
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
                <div class="d-flex justify-content-center" style="width: 100%; margin-top: 100px;">
                    <a id="btn-download-galley-page" href="">ПОКАЗАТЬ ЕЩЕ АЛЬБОМЫ</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready( function() {
        $('#btn-download-galley-page').click( function(e) {
            e.preventDefault();
            let data = $('.item-album').length;
            $.ajax({
                url: "add_gallery",
                dataType: 'json',
                data: data,
                type: 'POST'
            });
        });
    });
</script>
@endsection