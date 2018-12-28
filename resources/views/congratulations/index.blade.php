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
    <div class="layout-img hide">
        <div class="layout">

        </div>
        <div class="img-source-layout">
            <img src="" alt="">
        </div>
    </div>
    <div id="congratulations" class="container" style="padding-bottom: 100px; margin-top: 80px;">
        <div class="row" style="margin:0; padding: 0">
            <div class="content-congratulations col-12" style="padding: 0">
                {{--<div class="title-congratulations">--}}
                    {{--<span>Поздравления</span>--}}
                {{--</div>--}}

                <div id="congratulations_wrapper" class="d-flex flex-wrap justify-content-between">
                    @foreach ($congratulations as $congratulation)
                        <div class="item-congratulations">
                            @if(!preg_match('/<iframe*/', $congratulation->content))
                                <img class="img-item-congratulations img-thumbnail" src="{{ $congratulation->mainPhoto !== null ? $congratulation->mainPhoto->path : url('img/no-image.png')}}" alt="" />
                            @else
                                <div class="img-item-congratulations">{!! html_entity_decode($congratulation->content) !!}</div>
                            @endif
                            <div class="content-item-congratulations">
                                <span class="title-item-congratulations">{{ $congratulation->title }}<br></span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center" style="width: 100%; margin-top: 100px;">
                    <a id="btn-download-congratulations-page" href="">ПОКАЗАТЬ ЕЩЕ ПОЗДРАВЛЕНИЯ</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('script')
    <script src="{{asset('js/congratulations.js')}}"></script>
    <script>
        $(document).ready( function() {
            $('#btn-download-congratulations-page').click( function(e) {
                e.preventDefault();
                let data = $('.item-congratulations').length;
                $.ajax({
                    url: "{{ url('congratulations/add_congratulations') }}/" + data,
                    dataType: 'json',
                    type: 'get',
                    success: function(d) {
                        console.log(d);
                        if (d === 0) {
                            return false;
                        }
                        d.forEach(function (el) {
                            let ing = '<div class="item-congratulations">';
                            if (el.content) {
                                ing += '<img class="img-item-congratulations img-thumbnail" src="' + el.content + '" alt="" />';
                            } else {
                                ing += '<div class="img-item-congratulations">' + el.content + '</div>';
                            }
                            ing += '<div class="content-item-congratulations">' +
                                '<span class="title-item-congratulations">' + el.title + '<br /></span>' +
                                '</div></div>';
                            $('#congratulations_wrapper').append(ing);
                        });
                    }
                });
            });
        });
    </script>
@endsection