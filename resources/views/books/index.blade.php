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
    <div class="container" style="margin-top: 130px; padding-bottom: 100px !important">
        <div class="row" id="books_wrapper">
            <div class="links-books d-flex justify-content-between col-12">
                <a target="_blank" href="https://mgimo.ru/library/scientific-library/">Научная библиотека</a>
                <a target="_blank" href="https://mgimo.ru/library/resources/">Электронные ресурсы</a>
                <a target="_blank" href="https://mgimo.ru/about/structure/period/">Периодические издания</a>
                <a target="_blank" href="https://mgimo.ru/about/news/issues/">Новые издания</a>
                <a target="_blank" href="https://mgimo.ru/library/publications/">Публикации издательства и преподавателей</a>
            </div>
            @foreach($books as $book)
                <div class="col-xl-3 item-book-page">
                    <div class="card-book" style="width: 100%">
                        <a href="{{url('books/show/'.$book->id)}}">
                            <div class="card-head d-flex flex-column justify-content-start align-items-center" style="min-height: 200px">
                                <img class="card-img-top" src="{{ $book->coverPhoto->path }}" style="height: 100%"/>
                            </div>
                            <div class="card-body">
                                <div class="book_title">
                                    {{$book->title}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        @if(count($books) > 12)
            <div class="d-flex justify-content-center" style="width: 100%; margin-top: 100px;">
                <a id="btn-download-books-page" href="">ПОКАЗАТЬ ЕЩЕ КНИГИ</a>
            </div>
        @endif
    </div>
@endsection
@section('script')
    <script>
        $(document).ready( function() {
            $('#btn-download-books-page').click( function(e) {
                e.preventDefault();
                let data = $('.item-book-page').length;
                $.ajax({
                    url: "{{ url('books/add_books') }}/" + data,
                    dataType: 'json',
                    data: data,
                    type: 'get',
                    success: function(d) {
                        if (d === 0) {
                            return false;
                        }
                        d.forEach(function(el) {
                           $('#books_wrapper').append(
                                '<div class="col-xl-3 item-book-page">' +
                                    '<div class="card-book" style="width: 100%">' +
                                        '<a href="' + el.link + '">' +
                                            '<div class="card-head d-flex flex-column justify-content-start align-items-center" style="height: 200px">' +
                                                '<img class="card-img-top" src="' + el.photo + '" style="height: 100%" />' +
                                            '</div>' +
                                            '<div class="card-body">' +
                                                '<div class="book_title">' + el.title + '</div>' +
                                            '</div>' +
                                        '</a>' +
                                    '</div>' +
                                '</div>'
                           );
                        });
                    }
                });
            });
        });
    </script>
    <script src="{{asset('js/locations.js')}}"></script>
@endsection