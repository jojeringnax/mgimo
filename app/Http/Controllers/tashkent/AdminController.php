<?php

namespace App\Http\Controllers\tashkent;

use App\tashkent\Article;
use App\tashkent\Event;
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


    public function storeArticle(Request $r, $id=null)
    {
        $article = $id === null ? new Article() : Article::findOrFail($id);
        $article->fill($r->post());
        $article->moderated = 1;
        $article->save();
        return redirect('admin/tashkent/news');
    }

    public function deleteArticle($id)
    {
        Article::findOrFail($id)->delete();
        return redirect('admin/tashkent/news');
    }

    public function program()
    {
        return view('tashkent.admin.program', [
            'events' => Event::getAsArrayWithDates()
        ]);
    }

    public function storeProgram(Request $r, $id=null)
    {
        $event = $id === null ? new Event() : Event::findOrFail($id);
        $event->fill($r->post());
        $event->save();
        return redirect('admin/tashkent/program');
    }

    public function deleteProgram($id)
    {
        Event::findOrFail($id)->delete();
        return redirect('admin/tashkent/program');
    }



}
