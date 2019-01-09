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
                <div id="albums_wrapper" class="d-flex col-12 flex-wrap">
                    @foreach($albums as $album)
                        @php
                            $photos = $album->photos;
                        @endphp
                        @foreach($photos as $photo)
                            <a class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 item-album" href="{{ url('gallery/show', ['id' => $album->id]) }}">
                                <div class="item-card-album card" style="width: 100%">
                                    <img class="card-img-top" src="{{ $photo->path }}" alt="Card image cap">
                                    <div class="card-body d-flex flex-column align-items-start">
                                        <span class="title-card-album">{{ $album->name }}</span>
                                    </div>
                                </div>
                            </a>
                            @php break; @endphp
                        @endforeach
                    @endforeach
                </div>
                @if(count($albums) > 12)
                    <div class="d-flex justify-content-center" style="width: 100%; margin-top: 100px;">
                        <a id="btn-download-galley-page" href="">ПОКАЗАТЬ ЕЩЕ АЛЬБОМЫ</a>
                    </div>
                @endif
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
                url: "{{ url('gallery/add_albums') }}/" + data,
                dataType: 'json',
                type: 'get',
                success: function(d) {
                    if(d === 0) {
                        return false;
                    }
                    d.forEach(function(el) {
                        $('#albums_wrapper').append(
                            '<a class="col-3 item-album" href="' + el.link + '">' +
                                '<div  style="background-image: url(' + el.photo + '); background-size: cover;">' +
                                    '<div class="items-gallery">' +
                                        '<span>{{ $album->name }}</span>' +
                                    '</div>' +
                                '</div>' +
                            '</a>'
                        );
                    });
                }
            });
        });
    });
</script>
<script src="{{asset('js/locations.js')}}"></script>
@endsection