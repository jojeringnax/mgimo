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
                <div class="title-gallery-page">
                    <span>Галлерея</span>
                    <div class="tag">
                        <?php for ($i=1;$i<=6;$i++) { ?>
                        <div class="item-tags">
                            Рубрика
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="items-partners d-flex col-12 flex-wrap">
                    @foreach($albums as $album)
                    <div class="col-3">
                        <div class="item-partners-page">
                            <a href="{{ url('gallery/show', ['id' => $album->id]) }}" ><span>{{ $album->name }}</span></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection