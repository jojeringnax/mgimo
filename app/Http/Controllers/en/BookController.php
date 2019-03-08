<?php

namespace App\Http\Controllers\en;


use App\en\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('books.index', ['books' => Book::limit(12)->get(), 'booksNumber' => Book::all()->count()]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', [
            'article' => $book
        ]);
    }


    public function addBooks($data, Request $request)
    {
        if(!$request->ajax()) {
            return redirect('/');
        }
        $books = Book::limit(12)->skip($data)->get();
        foreach ($books as $book) {
            $resultArray[] = [
                'id' => $book->id,
                'photo' => $book->coverPhoto !== null ? $book->coverPhoto->path : url('img/no-image.png'),
                'title' => $book->title,
                'link' => url('books/show/'.$book->id)
            ];
        }
        return isset($resultArray) ? $resultArray : 0;
    }

}