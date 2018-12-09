<?php


namespace App\Http\Controllers;


use App\Congratulation;
use App\Event;
use App\News;
use App\Photo;
use App\PhotoConnect;
use App\Smi;
use App\Smis;
use App\Tag;
use App\TagConnect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('admin.index');
    }

    public function createArticle(Request $request)
    {
        if($request->isMethod('post')) {
            $news = new News();
            $news->title = $request->post('title');
            $news->content = $request->post('content');
            $news->moderated = true;
            $news->save();
            if ($file = $request->file('photo')) {
                $photo = new Photo();
                $path = 'news/' . $news->id . '.' . $file->getClientOriginalExtension();
                Storage::put($path, file_get_contents($file->getPathname()));
                $path = '/storage/photo/' . $path;
                $photo->type = PhotoConnect::NEWS;
                $photo->sizeX = getimagesize($file->getPathname())[0];
                $photo->sizeY = getimagesize($file->getPathname())[1];
                $photo->path = $path;
                $photo->save();
                $news->main_photo_id = $photo->id;
                $news->update(['main_photo_id' => $photo->id]);
            }
            for ($i = 1; $i <= 3; $i++) {
                if ($file = $request->file('photo' . $i)) {
                    $photo = new Photo();
                    $path = '/news/' . $news->id . '_' . $i . '.' . $file->getClientOriginalExtension();
                    Storage::put($path, file_get_contents($file->getPathname()));
                    $path = '/storage/photo' . $path;
                    $photo->type = PhotoConnect::NEWS;
                    $photo->sizeX = getimagesize($file->getPathname())[0];
                    $photo->sizeY = getimagesize($file->getPathname())[1];
                    $photo->path = $path;
                    $photo->save();
                    $photoConnect = new PhotoConnect();
                    $photoConnect->id = $photo->id;
                    $photoConnect->connect_id = $news->id;
                    $photoConnect->type = PhotoConnect::NEWS;
                    $photoConnect->save();
                }
            }
            if ($tags = $request->post('tags')) {
                $tags = preg_split('/,/', $tags);
                foreach ($tags as $tag) {
                    $tagModel = Tag::where('word', $tag)->first();
                    if ($tagModel === null) {
                        $tagModel = new Tag();
                        $tagModel->word = $tag;
                        $tagModel->count_news = 1;
                        $tagModel->save();
                    } else {
                        $tagModel->count_news += 1;
                        $tagModel->save();
                    }
                    $tagConnect = new TagConnect();
                    $tagConnect->id = $tagModel->id;
                    $tagConnect->connect_id = $news->id;
                    $tagConnect->type = TagConnect::NEWS;
                    $tagConnect->save();
                }
            }
            return 1;
        } elseif ($request->isMethod('get')) {
            return view('admin.news.form');
        }
    }

    public function updateArticle($articleId, Request $request)
    {
        if($request->isMethod('post')) {
            $article = News::find($articleId);
            $article->title = $request->post('title');
            $article->content = $request->post('content');
            $article->moderated = true;
            if ($file = $request->file('photo')) {
                if($article->main_photo_id !== null) {
                    $mainPhoto = Photo::find($article->main_photo_id);
                    $article->update(['main_photo_id' => null]);
                    $mainPhoto->delete();
                }
                $photo = new Photo();
                $path = 'news/' . $article->id . '.' . $file->getClientOriginalExtension();
                Storage::put($path, file_get_contents($file->getPathname()));
                $path = '/storage/photo/' . $path;
                $photo->type = PhotoConnect::NEWS;
                $photo->sizeX = getimagesize($file->getPathname())[0];
                $photo->sizeY = getimagesize($file->getPathname())[1];
                $photo->path = $path;
                $photo->save();
                $article->update(['main_photo_id' => $photo->id]);
            }
            $photos = $article->getPhotos();
            for ($i = 1; $i <= 3; $i++) {
                if ($file = $request->file('photo' . $i)) {
                    if(!$photos->isEmpty() && $i == 1) {
                        foreach ($photos as $photo) {
                            $photo->delete();
                        }
                    }
                    $photo = new Photo();
                    $path = '/news/' . $article->id . '_' . $i . '.' . $file->getClientOriginalExtension();
                    Storage::put($path, file_get_contents($file->getPathname()));
                    $path = '/storage/photo' . $path;
                    $photo->type = PhotoConnect::NEWS;
                    $photo->sizeX = getimagesize($file->getPathname())[0];
                    $photo->sizeY = getimagesize($file->getPathname())[1];
                    $photo->path = $path;
                    $photo->save();
                    $photoConnect = new PhotoConnect();
                    $photoConnect->id = $photo->id;
                    $photoConnect->connect_id = $article->id;
                    $photoConnect->type = PhotoConnect::NEWS;
                    $photoConnect->save();
                }
            }
            if ($tags = $request->post('tags')) {
                $tags = preg_split('/,/', $tags);
                if(!($tagConnects = TagConnect::where('connect_id', $article->id)->where('type', TagConnect::NEWS))->isEmpty()) {
                    foreach ($tagConnects as $tagConnect) {
                        $tag = $tagConnect->tag;
                        $tagConnect->tag->update(['count_news' => $tag->count_news - 1]);
                        $tagConnect->delete();
                    }
                };
                foreach ($tags as $tag) {
                    $tagModel = Tag::where('word', $tag)->first();
                    if ($tagModel === null) {
                        $tagModel = new Tag();
                        $tagModel->word = $tag;
                        $tagModel->count_news = 1;
                        $tagModel->save();
                    } else {
                        $tagModel->count_news += 1;
                        $tagModel->save();
                    }
                    $tagConnect = new TagConnect();
                    $tagConnect->id = $tagModel->id;
                    $tagConnect->connect_id = $article->id;
                    $tagConnect->type = TagConnect::NEWS;
                    $tagConnect->save();
                }
            }
            return 1;
        } elseif ($request->isMethod('get')) {
            $article = News::find($articleId);
            return view('admin.news.form', [
                'article' => $article,
                'tags' => $article->getTags(),
                'photos' => $article->getPhotos()
            ]);
        };
    }

    /**
     * @param $articleId
     * @return string
     */
    public function deleteArticle($articleId)
    {
        $article = News::find($articleId);
        $article->delete();
        return 1;
    }

    public function createEvent(Request $request)
    {
        if($request->isMethod('post')) {
            $event = new Event();
            $event->content = $request->post('content');
            $event->date = $request->post('date');
            $event->main = $request->post('main') === null ? 0 : 1;
            $event->save();
            if ($tags = $request->post('tags')) {
                $tags = preg_split('/,/', $tags);
                foreach ($tags as $tag) {
                    $tagModel = Tag::where('word', $tag)->first();
                    if ($tagModel === null) {
                        $tagModel = new Tag();
                        $tagModel->word = $tag;
                        $tagModel->count_events = 1;
                        $tagModel->save();
                    } else {
                        $tagModel->count_events += 1;
                        $tagModel->save();
                    }
                    $tagConnect = new TagConnect();
                    $tagConnect->id = $tagModel->id;
                    $tagConnect->connect_id = $event->id;
                    $tagConnect->type = TagConnect::EVENTS;
                    $tagConnect->save();
                }
            }
        } elseif ($request->isMethod('get')) {
            return view('admin.events.form');
        }
    }


    public function updateEvent($eventId, Request $request)
    {
        if($request->isMethod('post')) {
            $event = Event::find($eventId);
            $event->title = $request->post('content');
            $event->date = $request->post('date');
            $event->main = $request->post('main') === null ? 0 : 1;
            $event->save();
            if ($tags = $request->post('tags')) {
                $tagConnects = TagConnect::event($eventId);
                foreach ($tagConnects as $tagConnect) {
                    $tagConnect->tag->count_events -= 1;
                    $tagConnect->delete();
                }
                $tags = preg_split('/,/', $tags);
                foreach ($tags as $tag) {
                    $tagModel = Tag::where('word', $tag)->first();
                    if ($tagModel === null) {
                        $tagModel = new Tag();
                        $tagModel->word = $tag;
                        $tagModel->count_events = 1;
                        $tagModel->save();
                    } else {
                        $tagModel->count_events += 1;
                        $tagModel->save();
                    }
                    $tagConnect = new TagConnect();
                    $tagConnect->id = $tagModel->id;
                    $tagConnect->connect_id = $event->id;
                    $tagConnect->type = TagConnect::EVENTS;
                    $tagConnect->save();
                }
            }
        } elseif ($request->isMethod('get')) {
            return view('admin.events.form', [
                'event' => Event::find($eventId)
            ]);
        }
    }


    /**
     * @param $eventId
     * @return mixed
     */
    public function deleteEvent($eventId)
    {
        $event = Event::find($eventId);
        $event->delete();
        return 1;
    }


    public function createSmi(Request $request)
    {
        if($request->isMethod('post')) {
            $smi = new Smi();
            $smi->link = $request->post('link');
            $smi->link_view = $request->post('link_view');
            $smi->title = $request->post('title');
            $smi->save();
            return 1;
        } elseif ($request->isMethod('get')) {
            return view('admin.smis.form');
        }
    }

    public function updateSmi($smiId, Request $request)
    {
        if($request->isMethod('post')) {
            $smi = Smi::find($smiId);
            $smi->link = $request->post('link');
            $smi->link_view = $request->post('link_view');
            $smi->title = $request->post('title');
            $smi->save();
            return 1;
        } elseif ($request->isMethod('get')) {
            return view('admin.smis.form', [
                'smi' => Smi::find($smiId),
            ]);
        };
    }

    public function deleteSmi($smiId)
    {
        $smi = Smi::find($smiId);
        $smi->delete();
        return 1;
    }


    public function createCongratulation(Request $request)
    {

        if($request->isMethod('post')) {
            $congratulation = new Congratulation();
            $congratulation->title = $request->post('title');
            $congratulation->content = $request->post('content');
            $congratulation->date = $request->post('date');
            $congratulation->save();
            if ($file = $request->file('file')) {
                $photo = new Photo();
                $path = 'congratulations/' . $congratulation->id . '.' . $file->getClientOriginalExtension();
                Storage::put($path, file_get_contents($file->getPathname()));
                $path = '/storage/photo/' . $path;
                $photo->type = PhotoConnect::CONGRATULATION;
                $photo->sizeX = getimagesize($file->getPathname())[0];
                $photo->sizeY = getimagesize($file->getPathname())[1];
                $photo->path = $path;
                $photo->video = (boolean) strpos('video', $_FILES['file']['type']);
                $photo->save();
                $congratulation->update(['main_photo_id' => $photo->id]);
            }
            return 1;
        } elseif ($request->isMethod('get')) {
            return view('admin.congratulations.form');
        }
    }

}