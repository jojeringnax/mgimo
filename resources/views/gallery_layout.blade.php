@extends('layout')

@section('link')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="layout_gallery d-flex flex-wrap col-12">
                <div class="title-gallery-layout col-12">
                    <span>Галерея</span>
                </div>
                <div id="gallery-photos" class="d-flex flex-wrap">
                    <?php for ($i=1;$i<=12;$i++) { ?>
                    <div class="col-3">
                        <div class="item-gallery">
                            {{--<img src="" alt="" style="width:100%">--}}
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection