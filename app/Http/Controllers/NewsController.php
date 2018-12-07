<?php


namespace App\Http\Controllers;


use App\News;
use App\Photo;

class NewsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('news.index', ['news' => News::all()]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return view('news.show', [
            'article' => News::findOrFail($id)
        ]);
    }


}