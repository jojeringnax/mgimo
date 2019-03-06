<?php

namespace App\Http\Controllers\tashkent\en;

use App\tashkent\en\Article;
use App\tashkent\en\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class AdminController
 * @package App\Http\Controllers\tashkent
 */
class AdminController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('tashkent.en.admin.index');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function news()
    {
        $news = Article::all();
        return view('tashkent.en.admin.news', [
            'news' => $news
        ]);
    }


    /**
     * @param Request $r
     * @param null $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeArticle(Request $r, $id=null)
    {
        $article = $id === null ? new Article() : Article::findOrFail($id);
        $article->fill($r->post());
        $article->moderated = 1;
        $article->save();
        return redirect('admin/tashkent/en/news');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteArticle($id)
    {
        Article::findOrFail($id)->delete();
        return redirect('admin/tashkent/en/news');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function program()
    {
        return view('tashkent.en.admin.program', [
            'events' => Event::getAsArrayWithDates()
        ]);
    }

    /**
     * @param Request $r
     * @param null $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeProgram(Request $r, $id=null)
    {
        $event = $id === null ? new Event() : Event::findOrFail($id);
        $event->fill($r->post());
        if($r->post('all_day') === null) $event->all_day = false;
        $event->save();
        return redirect('admin/tashkent/en/program');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteProgram($id)
    {
        Event::findOrFail($id)->delete();
        return redirect('admin/tashkent/en/program');
    }


    /**
     * @param $date
     * @return int
     */
    public function isExistForTodayForAllDay($date)
    {
        $event = Event::where('date', $date)->where('all_day', true)->first();
        return $event !== null ? 1 : 0;
    }
}
