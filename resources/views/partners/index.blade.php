@extends('layout')

@section('link')
@endsection
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
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
                        @if($partner->category == \App\Partner::ORGANIZATORS)
                            <a href="{{ $partner->link }}">
                                <img title="{{ $partner->name }}" src="{{ $partner->photo !== null ? $partner->photo->path : 'img/no-image.png'}}" alt="{{ $partner->name }}" style="height: 100%" />
                            </a>
                        @endif
                    @endforeach
                </div>
                    <div class="general-sponsors item-partners-page">
                        <div class="title-partners-page">
                            ГЕНЕРАЛЬНЫЕ СПОНСОРЫ
                        </div>
                        @foreach($partners as $partner)
                            @if($partner->category == \App\Partner::GENERAL_SPONSORS)
                                <a href="{{ $partner->link }}">
                                    <img title="{{ $partner->name }}" src="{{ $partner->photo !== null ? $partner->photo->path : 'img/no-image.png'}}" alt="{{ $partner->name }}" style="height: 100%" />
                                </a>
                            @endif
                        @endforeach
                    </div>
                    <div class="sponsors item-partners-page">
                        <div class="title-partners-page">
                            СПОНСОРЫ И ПАРТНЕРЫ
                        </div>
                        @foreach($partners as $partner)
                            @if($partner->category == \App\Partner::SPONSORS)
                                <a href="{{ $partner->link }}">
                                    <img title="{{ $partner->name }}" src="{{ $partner->photo !== null ? $partner->photo->path : 'img/no-image.png'}}" alt="{{ $partner->name }}" style="height: 100%" />
                                </a>
                            @endif
                        @endforeach
                    </div>
                    <div class="inf-partners item-partners-page">
                        <div class="title-partners-page">
                            ИНФОРМАЦИОННЫЕ ПАРТНЕРЫ
                        </div>
                        @foreach($partners as $partner)
                            @if($partner->category == \App\Partner::INFORM_PARTNERS)
                                <a href="{{ $partner->link }}">
                                    <img title="{{ $partner->name }}" src="{{ $partner->photo !== null ? $partner->photo->path : 'img/no-image.png'}}" alt="{{ $partner->name }}" style="height: 100%" />
                                </a>
                            @endif
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection