@extends('layout')

@section('link')
@endsection

@section('content')@endsection
    <div class="container">
        @foreach($books as $book)
            <img src="{{ $book->coverPhoto->path }}" />
            <div class="book_title">
                {{ $book->title }}
            </div>
            <div class="book_descr">
                {{ $book->description }}
            </div>
        @endforeach
    </div>
@section('script')

@endsection