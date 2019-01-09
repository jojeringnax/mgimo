@extends('layout')
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection
@section('color')
    background-color: white !important;
@endsection
@section('content')
    <div class="container" style="margin-top: 150px; padding-bottom: 120px">
        <div class="row">
            <div class="media-page d-flex flex-column" style="width:100%">
                <div class="title-media">
                    <span>СМИ о нас</span>
                </div>
                @if(!$smis->isEmpty())
                    <div class="media-page-content d-flex justify-content-between flex-wrap" style="width:100%">
                        @foreach($smis as $smi)
                            <div class="col-3 item-media-news d-flex">
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
            <div class="d-flex justify-content-center" style="width: 100%; margin-top: 100px;">
                <a id="btn-download-smis-page" href="">ПОКАЗАТЬ ЕЩЕ СМИ О НАС</a>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready( function() {
            $('#btn-download-smis-page').click( function(e) {
                e.preventDefault();
                let data = $('.item-media-news').length;
                $.ajax({
                    url: "add_smis",
                    dataType: 'json',
                    data: data,
                    type: 'POST'
                });
            });
        });
    </script>
@endsection
