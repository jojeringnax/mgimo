@extends('layout')

@section('link')
@endsection
@section('shadow')
    box-shadow: 0 3px 10px rgba(0,0,0, 0.07) !important;
@endsection

@section('content')
    <div class="container" style="margin-top: 130px; padding-bottom: 100px !important">
        <div class="row">
            @foreach($books as $book)
                <div class="col-xl-3 item-book-page">
                    <div class="card-book" style="width: 100%">
                        <a href="{{url('books/show/'.$book->id)}}">
                            <div class="card-head d-flex flex-column justify-content-start align-items-center" style="height: 200px">
                                <img call="card-img-top" src="{{ $book->coverPhoto->path }}" style="height: 100%"/>
                            </div>
                            <div class="card-body">
                                <div class="book_title">
                                    {{$book->title}}
                                </div>
                                <div class="price-book text-center" style="margin-top: 30px;">
                                    {{$book->price}}
                                    &#8381;
                                </div>
                                {{--<div class="link-book-pay">--}}
                                    {{--<a href="">Купить</a>--}}
                                {{--</div>--}}
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')

@endsection