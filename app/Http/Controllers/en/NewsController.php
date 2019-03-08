<?php


namespace App\Http\Controllers\en;


use App\Http\Controllers\Controller;
use App\en\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('news.index', ['news' => News::getModerated(), 'newsNumber' => News::all()->count()]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $article = News::findOrFail($id);
        return view('news.show', [
            'article' => $article,
            'articlePhotos' => $article->getPhotos()
        ]);
    }

    public function addNews(Request $request)
    {
        if(!$request->ajax()) {
            return redirect('/');
        }
        $news = News::getModerated(9, $request->data);
        foreach ($news as $article) {
            $resultArray[] = [
                'id' => $article->id,
                'created_at' => $article->created_at,
                'updated_at' => $article->updated_at,
                'title' => $article->title,
                'content' => $article->content,
                'photo' => $article->mainPhoto !== null ? $article->mainPhoto->path : url('img/no-image.png'),
                'link' => url('news/show', ['id' => $article->id]),
                'tag' => $article->getTag()
            ];
        }
        return isset($resultArray) ? json_encode($resultArray, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : 0;
    }
}