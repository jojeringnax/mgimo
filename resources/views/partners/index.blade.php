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
    <div class="container" style="margin-top: 100px; padding-bottom: 120px">
        <div class="row">
            <div class="partners-page d-flex flex-wrap flex-column">
                <div class="logo">
                    <img src="{{asset('img/icon/logo.svg')}}" alt="logo-mgimo" style="width: 100px;">
                </div>
                <div class="organizers item-partners-page">
                    <div class="title-partners-page">
                        ОРГАНИЗАТОРЫ
                    </div>
                    @foreach($partners as $partner)
                        @if($partner->category == \App\Partner::ORGANIZATORS && $partner->type === 0)
                            <a class="organizers-a" href="{{ $partner->link }}">
                                <img title="{{ $partner->name }}" src="{{ $partner->photo !== null ? $partner->photo->path : 'img/no-image.png'}}" alt="{{ $partner->name }}" style="" />
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="general-sponsors item-partners-page">
                    <div class="title-partners-page">
                        ГЕНЕРАЛЬНЫЕ СПОНСОРЫ
                    </div>
                    @foreach($partners as $partner)
                        @if($partner->category == \App\Partner::GENERAL_SPONSORS && $partner->type === 0)
                            <a class="gener-sponsors-a" href="{{ $partner->link }}">
                                <img title="{{ $partner->name }}" src="{{ $partner->photo !== null ? $partner->photo->path : 'img/no-image.png'}}" alt="{{ $partner->name }}" style="" />
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="sponsors item-partners-page">
                    <div class="title-partners-page">
                        СПОНСОРЫ И ПАРТНЕРЫ
                    </div>
                    @foreach($partners as $partner)
                        @if($partner->category == \App\Partner::SPONSORS && $partner->type === 0)
                            <a class="sponsors-a" href="{{ $partner->link }}">
                                <img title="{{ $partner->name }}" src="{{ $partner->photo !== null ? $partner->photo->path : 'img/no-image.png'}}" alt="{{ $partner->name }}" style="" />
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="inf-partners item-partners-page">
                    <div class="title-partners-page">
                        ИНФОРМАЦИОННЫЕ ПАРТНЕРЫ
                    </div>
                    @foreach($partners as $partner)
                        @if($partner->category == \App\Partner::INFORM_PARTNERS && $partner->type === 0)
                            <a class="inf-partners-a" href="{{ $partner->link }}">
                                <img title="{{ $partner->name }}" src="{{ $partner->photo !== null ? $partner->photo->path : 'img/no-image.png'}}" alt="{{ $partner->name }}" style="" />
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="inf-partners item-partners-page flex-wrap">
                    <div class="title-partners-page col-12">
                       А ТАКЖЕ
                    </div>
                    @foreach($partners as $partner)
                        @if($partner->type === 1)
                            <a class="partner-ind d-flex flex-column col-xl-4" href="{{ $partner->link }}">
                                <span class="name-ind-partner">{{$partner->title}}</span>
                                <span class="name-pos-partner">{{$partner->position}}</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/locations.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.item-partners-page').each(function () {
                if($(this).children('a').length === 0) {
                    console.log($(this))
                    $(this).css({'display': 'none'});
                    $(this).addClass('hide');

                }
            })
        })
    </script>
@endsection