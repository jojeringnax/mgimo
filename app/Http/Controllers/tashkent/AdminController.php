<?php

namespace App\Http\Controllers\tashkent;

use App\tashkent\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('tashkent.admin.index');
    }


    public function news()
    {
        $news = Article::all();
        return view('tashkent.admin.news', [
            'news' => $news
        ]);
    }


    public function storeArticle(Request $r)
    {
        if($r->isMethod('get')) {
            return view('tashkent.admin.news.create');
        }
        $article = new Article();
        $article->fill($r->post());
        $article->moderated = 1;
        $article->save();
        return 1;
    }
}
