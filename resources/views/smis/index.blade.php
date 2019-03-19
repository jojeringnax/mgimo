@extends('layout')
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection
@section('color')
    background-color: white !important;
@endsection
@section('content')
    <script>
        const Mounth = {
            0: "Января",
            1: "Февраля",
            2: "Марта",
            3: "Апреля",
            4: "Мая",
            5: "Июня",
            6: "Июля",
            7: "Августа",
            8: "Сентября",
            9: "Октября",
            10: "Ноября",
            11: "Декабря"
        }
        function createDate(date, id) {
            let dateJs = new Date(date);
            let  result = dateJs.getDate() +' '+  Mounth[dateJs.getMonth()] +' '+ dateJs.getFullYear();
            console.log(result);
            idd = "date-" + id;
            document.getElementById(idd).innerHTML = result;
        }
    </script>
    <div class="container container-content" style="margin-top: 120px; padding-bottom: 120px">
        <a class="button-smis-page btn-linkk btn-mgimo" href="https://mgimo.ru/about/structure/press/" target="_blank"><span class="text-btn"><?= trans('messages.smis__press__service') ?></span><span class="arrow-btn"></span></a>
        <div class="row">
            <div class="media-page d-flex flex-column" style="width:100%">
                @if(!$smis->isEmpty())
                    <div class="media-page-content d-flex justify-content-start flex-wrap" style="width:100%">
                        @foreach($smis as $smi)
                            <div data-index="{{$loop->index}}" class="col-xl-3 col-lg-3 col-md-4  col-sm-6 col-12 item-media-news d-flex">
                                <a href="{{ $smi->link }}" target="_blank">
                                    <span class="source-media-news">{{ $smi->link_view }}</span>
                                    <span class="title-media-news">{{ $smi->title }}</span>
                                    <span id="date-{{$smi->id}}" class="date-media-news"><script>createDate("{{$smi->created_at == null ? '' : $smi->created_at}}", "{{$smi->id == null ? '' : $smi->id}}")</script></span>
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
                    <a id="btn-download-smis-page" class="btn-mgimo" href=""><?= trans('messages.smis__more__media') ?></a>
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
                    url: "<?= App::getLocale() == 'en' ?url('add_smis/en') : url('add_smis') ?>/" + data,
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
                                '<span id="date-"' + el.id + 'class="date-media-news">'+ createDate(el.created_at, el.id)+'</span>' +
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
