@extends('layout')

@section('link')
@endsection

@section('content')@endsection
    <div class="container" style="margin-top: 130px; padding-bottom: 100px !important">
        <div class="row">
            @foreach($books as $book)
                <div class="col-xl-2 item-book-page" style="">
                    <div class="card" style="">
                        <div class="card-head d-flex flex-column justify-content-start align-items-center">
                            <img call="card-img-top" src="{{ $book->coverPhoto->path }}" style="width: 100%"/>
                        </div>
                        <div class="card-body">
                            <div class="book_title">
                                {{ link_to('books/show/'.$book->id, $book->title, ['class' => '']) }}
                            </div>
                            {{--                            <div class="book_descr">
                                                            {{ $book->description }}
                                                        </div>--}}
                            <div class="link-book-pay">
                                <a href="">Купить</a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@section('script')

@endsection