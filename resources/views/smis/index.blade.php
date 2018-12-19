@extends('layout')
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="media-page d-flex flex-column" style="width:100%">
                <div class="title-media">
                    <span>СМИ о нас</span>
                </div>
                @if(!$smis->isEmpty())
                    <div class="media-page-content d-flex justify-content-between flex-wrap" style="width:100%">
                        @foreach($smis as $smi)
                            <div class="col-3 item-media-news d-flex">
                                <a href="{{ $smi->link }}">
                                    <span class="source-media-news">{{ $smi->link_view }}</span>
                                    <span class="title-media-news">{{ $smi->title }}</span>
                                </a>
                                @if (($loop->index + 1)%4) <hr> @endif
                            </div>
                        @endforeach
                    </div>
                    <button id="btn-download-media" type="button" class="btn btn-raised btn-primary">Подгрузить еще новостей</button>
                @else
                    <!-- Вывод, если новостей нет --><div>Нет новостей</div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/media.js') }}"></script>
@endsection
