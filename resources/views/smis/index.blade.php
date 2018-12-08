@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="media-page d-flex flex-column">
                <div class="title-media">
                    <span>СМИ о нас</span>
                </div>
                @if(!$smis->isEmpty())
                    <div class="media-page-content d-flex justify-content-between flex-wrap">
                        @foreach($smis as $smi)
                            <div class="col-3 item-media-news d-flex">
                                <span class="source-media-news">{{ $smi->link_view }}</span>
                                <span class="title-media-news">
                                    {{ $smi->title }}
                                </span>
                                @if ($loop->index%4) <hr> @endif
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
