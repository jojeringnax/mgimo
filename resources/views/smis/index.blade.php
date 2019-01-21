@extends('layout')
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection
@section('color')
    background-color: white !important;
@endsection
@section('content')
    <div class="container container-content" style="margin-top: 150px; padding-bottom: 120px">
        <a class="button-smis-page" href="https://mgimo.ru/about/structure/press/" target="_blank">Пресс-служба МГИМО<span></span></a>
        <div class="row">
            <div class="media-page d-flex flex-column" style="width:100%">
                @if(!$smis->isEmpty())
                    <div class="media-page-content d-flex justify-content-between flex-wrap" style="width:100%">
                        @foreach($smis as $smi)
                            <div data-index="{{$loop->index}}" class="col-xl-3 col-lg-3 col-md-4  col-sm-6 col-12 item-media-news d-flex">
                                <a href="{{ $smi->link }}" target="_blank">
                                    <span class="source-media-news">{{ $smi->link_view }}</span>
                                    <span class="title-media-news">{{ $smi->title }}</span>
                                    <span class="date-media-news">{{ implode(' ', [date('d', strtotime($smi->created_at)), \App\News::nameMonth[date('n', strtotime($smi->created_at))], date('Y', strtotime($smi->created_at))]) }}</span>
                                </a>
                                @if (($loop->index + 1)%4) <hr> @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Вывод, если новостей нет --><div>Нет новостей</div>
                @endif
            </div>
            @if($smisNumber > 12)
                <div class="d-flex justify-content-center" style="width: 100%; margin-top: 100px;">
                    <a id="btn-download-smis-page" href="">ПОКАЗАТЬ ЕЩЕ СМИ О НАС</a>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready( function() {
            $('#btn-download-smis-page').click( function(e) {
                e.preventDefault();
                let data = $('.item-media-news').length;
                let text = '';
                $.ajax({
                    url: "{{url('add_smis')}}/" + data,
                    dataType: 'json',
                    data: {data:data},
                    type: 'get',
                    success: function (response) {
                        let i = 1;
                        response.forEach(function(el, ) {
                            text +=
                                '<div data-index="'+el.index+'" class="col-xl-3 col-lg-3 col-md-4  col-sm-6 col-12 item-media-news d-flex">' +
                                '<a href="'+el.link+'" target="_blank">' +
                                '<span class="source-media-news">'+el.link_view+'</span>' +
                                '<span class="title-media-news">'+el.title+'</span>' +
                                '<span class="date-media-news">{{ implode(' ', [date('d', strtotime($smi->created_at)), \App\News::nameMonth[date('n', strtotime($smi->created_at))], date('Y', strtotime($smi->created_at))]) }}</span>' +
                                '</a>';
                            if (i % 4 !== 0 && i !== response.length) {
                                text += '<hr>'+ '</div>';
                            }else {
                                text +='</div>';
                            }
                            i++
                        });
                        $('.media-page-content').append(text);
                    },
                    error: function (response) {
                        console.log(response)
                    }
                });
            });
        });
    </script>
    <script src="{{asset('js/locations.js')}}"></script>
@endsection
