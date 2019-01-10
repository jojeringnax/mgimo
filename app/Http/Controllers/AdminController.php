<?php

namespace App\Http\Controllers;
ini_set('upload_max_filesize', '128M');
ini_set('post_max_size ', '128M');


use App\Album;
use App\Book;
use App\Congratulation;
use App\Event;
use App\News;
use App\Partner;
use App\Photo;
use App\PhotoConnect;
use App\Smi;
use App\Subscriber;
use App\Tag;
use App\TagConnect;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{


    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function createArticle(Request $request)
    {
        if($request->isMethod('post')) {
            if($request->ajax()) {
                $this->middleware('guest');
            }
            $news = new News();
            $news->title = $request->post('title');
            $news->content = $request->post('content');
            $news->moderated = $request->ajax() ? false : $request->post('moderated') === null ? false : true;
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
            if($request->ajax()) {
                return 1;
            }
            return redirect()->route('news_index');
        } elseif ($request->isMethod('get')) {
            return view('admin.news.form');
        }
        return 0;
    }


    /**
     * @param $articleId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function updateArticle($articleId, Request $request)
    {
        if($request->isMethod('post')) {
            $article = News::find($articleId);
            $article->title = $request->post('title');
            $article->content = $request->post('content');
            $article->moderated = $request->post('moderated') === null ? false : true;
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
                    if(!($photos->isEmpty()) && $i == 1) {
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
                if(!(($tagConnects = TagConnect::article($articleId))->isEmpty())) {
                    foreach ($tagConnects as $tagConnect) {
                        $tag = $tagConnect->tag;
                        $tag->update(['count_news' => $tag->count_news - 1]);
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
                        $tagModel->update(['count_news' => $tagModel->count_news + 1]);
                    }
                    $tagConnect = new TagConnect();
                    $tagConnect->id = $tagModel->id;
                    $tagConnect->connect_id = $article->id;
                    $tagConnect->type = TagConnect::NEWS;
                    $tagConnect->save();
                }
            }
            $article->save();
            return redirect()->route('news_index');
        } elseif ($request->isMethod('get')) {
            $article = News::find($articleId);
            return view('admin.news.form', [
                'article' => $article,
                'tags' => $article->getTags(),
                'photos' => $article->getPhotos()
            ]);
        };
        return 0;
    }

    /**
     * @param $articleId
     * @return int
     */
    public function deleteArticle($articleId)
    {
        News::find($articleId)->delete();
        return redirect()->route('news_index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function createEvent(Request $request)
    {
        if($request->isMethod('post')) {
            $main = $request->post('main') === null ? 0 : 1;
            if($request->ajax()) {
                $main = 0;
                $this->middleware('guest');
            }
            $event = new Event();
            $event->title = $request->post('title');
            $event->content = $request->post('content');
            $event->date = $request->post('date');
            $event->location = $request->post('location');
            $event->main = $main;
            $event->save();
            $files = $request->allFiles()['photos'] ? $request->allFiles()['photos'] : [];
            $i = 0;
            foreach ($files as $file) {
                $i++;
                $photo = new Photo();
                $path = 'events/'.$event->id.'_'.$i.'.'.$file->getClientOriginalExtension();
                Storage::put($path, file_get_contents($file->getPathname()));
                $path = '/storage/photo/' . $path;
                $photo->type = PhotoConnect::GALLERY;
                $photo->path = $path;
                $photo->sizeX = getimagesize($file->getPathname())[0];
                $photo->sizeY = getimagesize($file->getPathname())[1];
                $photo->save();
                $photoConnect = new PhotoConnect();
                $photoConnect->id = $photo->id;
                $photoConnect->connect_id = $event->id;
                $photoConnect->type = PhotoConnect::EVENT;
                $photoConnect->save();
            }
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
                        $tagModel->update(['count_event', $tagModel->count_event + 1]);
                    }
                    $tagConnect = new TagConnect();
                    $tagConnect->id = $tagModel->id;
                    $tagConnect->connect_id = $event->id;
                    $tagConnect->type = TagConnect::EVENTS;
                    $tagConnect->save();
                }
            }
            $event->update(['main_photo_id' => $request->post('main_photo_id')]);
            return $request->ajax() ? json_encode($event) : redirect()->route('events_index');
        } elseif ($request->isMethod('get')) {
            return view('admin.events.form');
        }
        return 0;
    }


    /**
     * @param $eventId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function updateEvent($eventId, Request $request)
    {
        if($request->isMethod('post')) {
            $event = Event::find($eventId);
            $event->content = $request->post('content');
            $event->date = $request->post('date');
            $event->title = $request->post('title');
            $event->location = $request->post('location');
            $event->main = $request->post('main') === null ? 0 : 1;
            if ($tags = $request->post('tags')) {
                $tagConnects = TagConnect::event($eventId);
                foreach ($tagConnects as $tagConnect) {
                    $tag = $tagConnect->tag;
                    $tag->update(['count_events' => $tag->count_events - 1]);
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
                        $tagModel->update(['count_events' => $tagModel->count_events + 1]);
                    }
                    $tagConnect = new TagConnect();
                    $tagConnect->id = $tagModel->id;
                    $tagConnect->connect_id = $event->id;
                    $tagConnect->type = TagConnect::EVENTS;
                    $tagConnect->save();
                }
            }
            if(isset($request->allFiles()['photos'])) {
                $photos = $event->getPhotos();
                if($photos !== null) {
                    foreach ($photos as $photo) {
                        $photo->delete();
                    }
                }
                $files = $request->allFiles()['photos'];
                $i = 0;
                foreach ($files as $file) {
                    $i++;
                    $photo = new Photo();
                    $path = 'events/'.$event->id.'_'.$i.'.'.$file->getClientOriginalExtension();
                    Storage::put($path, file_get_contents($file->getPathname()));
                    $path = '/storage/photo/' . $path;
                    $photo->type = PhotoConnect::GALLERY;
                    $photo->path = $path;
                    $photo->sizeX = getimagesize($file->getPathname())[0];
                    $photo->sizeY = getimagesize($file->getPathname())[1];
                    $photo->save();
                    $photoConnect = new PhotoConnect();
                    $photoConnect->id = $photo->id;
                    $photoConnect->connect_id = $event->id;
                    $photoConnect->type = PhotoConnect::EVENT;
                    $photoConnect->save();
                }
            }
            $event->main_photo_id = $request->post('main_photo_id');
            $event->save();

            return redirect()->route('events_index');
        } elseif ($request->isMethod('get')) {
            return view('admin.events.form', [
                'event' => Event::find($eventId)
            ]);
        }
        return 0;
    }


    /**
     * @param $eventId
     * @return int
     */
    public function deleteEvent($eventId)
    {
        Event::find($eventId)->delete();
        return redirect()->route('events_index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function createSmi(Request $request)
    {
        if($request->isMethod('post')) {
            $smi = new Smi();
            $smi->link = $request->post('link');
            $smi->link_view = $request->post('link_view');
            $smi->title = $request->post('title');
            $smi->date = $request->post('date');
            $smi->save();
            return redirect()->route('smis_index');
        } elseif ($request->isMethod('get')) {
            return view('admin.smis.form');
        }
        return 0;
    }


    /**
     * @param $smiId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function updateSmi($smiId, Request $request)
    {
        if($request->isMethod('post')) {
            $smi = Smi::find($smiId);
            $smi->link = $request->post('link');
            $smi->link_view = $request->post('link_view');
            $smi->title = $request->post('title');
            $smi->date = $request->post('date');
            $smi->save();
            return redirect()->route('smis_index');
        } elseif ($request->isMethod('get')) {
            return view('admin.smis.form', [
                'smi' => Smi::find($smiId),
            ]);
        };
        return 0;
    }

    /**
     * @param $smiId
     * @return int
     */
    public function deleteSmi($smiId)
    {
        Smi::find($smiId)->delete();
        return redirect()->route('smis_index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function createCongratulation(Request $request)
    {
        if($request->isMethod('post')) {
            $moderated = $request->post('moderated') === null ? 0 : 1;
            $priority = $request->post('priority');
            if($request->ajax()) {
                $this->middleware('guest');
                $moderated = 0;
                $priority = 1;
            }
            $congratulation = new Congratulation();
            $congratulation->moderated = $moderated;
            $congratulation->title = $request->post('title');
            $congratulation->content = $request->post('content');
            $congratulation->date = $request->post('date');
            $congratulation->priority = $priority;
            $congratulation->save();
            if ($file = $request->file('file')) {
                $photo = new Photo();
                $path = 'congratulations/' . $congratulation->id . '.' . $file->getClientOriginalExtension();
                $video = (boolean) strpos('video', $_FILES['file']['type']);
                Storage::put($path, file_get_contents($file->getPathname()));
                $path = '/storage/photo/' . $path;
                $photo->type = PhotoConnect::CONGRATULATION;
                $photo->sizeX = !$video ? getimagesize($file->getPathname())[0] : 0;
                $photo->sizeY = !$video ? getimagesize($file->getPathname())[1] : 0;
                $photo->path = $path;
                $photo->video = $video;
                $photo->save();
                $congratulation->update(['main_photo_id' => $photo->id]);
            }
            if(isset($request->allFiles()['photos'])) {
                $files = $request->allFiles()['photos'];
                $i = 0;
                foreach ($files as $file) {
                    $i++;
                    $photo = new Photo();
                    $photo->type = PhotoConnect::GALLERY;
                    $photo->path = '';
                    $photo->sizeX = getimagesize($file->getPathname())[0];
                    $photo->sizeY = getimagesize($file->getPathname())[1];
                    $photo->save();
                    $path = 'congratulations/' . $congratulation->id . '_' . $i . '.' . $file->getClientOriginalExtension();
                    Storage::put($path, file_get_contents($file->getPathname()));
                    $path = '/storage/photo/' . $path;
                    $photo->path = $path;
                    $photo->save();
                    $photoConnect = new PhotoConnect();
                    $photoConnect->id = $photo->id;
                    $photoConnect->type = PhotoConnect::CONGRATULATION;
                    $photoConnect->connect_id = $congratulation->id;
                    $photoConnect->save();
                }
            }
            return $request->ajax() ? json_encode($congratulation) : redirect()->route('congratulations_index');
        } elseif ($request->isMethod('get')) {
            return view('admin.congratulations.form');
        }
        return 0;
    }

    /**
     * @param Request $request
     * @param $congratulationId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function updateCongratulation(Request $request, $congratulationId)
    {
        if($request->isMethod('post')) {
            $congratulation = Congratulation::find($congratulationId);
            $congratulation->title = $request->post('title');
            $congratulation->content = $request->post('content');
            $congratulation->date = $request->post('date');
            $congratulation->priority = $request->post('priority');
            $congratulation->moderated = $request->post('moderated') === null ? false : true;
            if ($file = $request->file('file')) {
                if ($photo = $congratulation->mainPhoto) {
                    $congratulation->update(['main_photo_id' => null]);
                    $photo->delete();
                    unset($photo);
                }
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
                $photoConnect = new PhotoConnect();
                $photoConnect->id = $photo->id;
                $photoConnect->type = PhotoConnect::CONGRATULATION;
                $photoConnect->connect_id = $congratulation->id;
                $photoConnect->save();
                $congratulation->main_photo_id = $photo->id;
            }
            if(isset($request->allFiles()['photos'])) {
                $files = $request->allFiles()['photos'];
                $i = 0;
                $oldPhotos = $congratulation->getPhotos();
                foreach ($oldPhotos as $oldPhoto) {
                    $oldPhoto->delete();
                }
                foreach ($files as $file) {
                    $i++;
                    $photo = new Photo();
                    $photo->type = PhotoConnect::GALLERY;
                    $photo->path = '';
                    $photo->sizeX = getimagesize($file->getPathname())[0];
                    $photo->sizeY = getimagesize($file->getPathname())[1];
                    $photo->save();
                    $path = 'congratulations/' . $congratulation->id . '_' . $i . '.' . $file->getClientOriginalExtension();
                    Storage::put($path, file_get_contents($file->getPathname()));
                    $path = '/storage/photo/' . $path;
                    $photo->path = $path;
                    $photo->save();
                }
            }
            $congratulation->save();
            return redirect()->route('congratulations_index');
        } elseif ($request->isMethod('get')) {
            return view('admin.congratulations.form', [
                'congratulation' => Congratulation::find($congratulationId),
            ]);
        }
        return 0;
    }


    /**
     * @param $congratulationId
     * @return int
     */
    public function deleteCongratulation($congratulationId)
    {
        Congratulation::find($congratulationId)->delete();
        return redirect()->route('congratulations_index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function createBook(Request $request)
    {
        if($request->isMethod('post')) {
            $book = new Book();
            $book->title = $request->post('title');
            $book->description = $request->post('description');
            $book->link = $request->post('link');
            $book->status = $request->post('status');
            $book->price = $request->post('price');
            $book->save();
            if ($file = $request->file('photo')) {
                $photo = new Photo();
                $path = 'books/' . $book->id . '.' . $file->getClientOriginalExtension();
                Storage::put($path, file_get_contents($file->getPathname()));
                $path = '/storage/photo/' . $path;
                $photo->type = PhotoConnect::BOOK;
                $photo->sizeX = getimagesize($file->getPathname())[0];
                $photo->sizeY = getimagesize($file->getPathname())[1];
                $photo->path = $path;
                $photo->save();
                $book->cover_photo_id = $photo->id;
                $book->update(['cover_photo_id' => $photo->id]);
            }
            return redirect()->route('books_index');
        } elseif ($request->isMethod('get')) {
            return view('admin.books.form');
        }
        return 0;
    }

    /**
     * @param $bookId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function updateBook($bookId, Request $request)
    {
        if($request->isMethod('post')) {
            $book = Book::find($bookId);
            $book->title = $request->post('title');
            $book->link = $request->post('link');
            $book->description = $request->post('description');
            $book->status = $request->post('status');
            $book->price = $request->post('price');
            if ($file = $request->file('photo')) {
                if($book->cover_photo_id !== null) {
                    $coverPhoto = $book->coverPhoto;
                    $book->update(['cover_photo_id' => null]);
                    $coverPhoto->delete();
                }
                $photo = new Photo();
                $path = 'news/' . $book->id . '.' . $file->getClientOriginalExtension();
                Storage::put($path, file_get_contents($file->getPathname()));
                $path = '/storage/photo/' . $path;
                $photo->type = PhotoConnect::NEWS;
                $photo->sizeX = getimagesize($file->getPathname())[0];
                $photo->sizeY = getimagesize($file->getPathname())[1];
                $photo->path = $path;
                $photo->save();
                $book->cover_photo_id = $photo->id;
            }
            $book->save();
            return redirect()->route('books_index');
        } elseif ($request->isMethod('get')) {
            $book = Book::find($bookId);
            return view('admin.books.form', [
                'book' => $book
            ]);
        };
        return 0;
    }

    /**
     * @param $bookId
     * @return int
     */
    public function deleteBook($bookId)
    {
        Book::find($bookId)->delete();
        return redirect()->route('books_index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function createPartner(Request $request)
    {
        if($request->isMethod('post')) {
            $partner = new Partner();
            $partner->link = $request->post('link');
            $partner->name = $request->post('name');
            $partner->priority = $request->post('priority');
            $partner->category = $request->post('category');
            $partner->save();
            if ($file = $request->file('photo')) {
                if($partner->cover_photo_id !== null) {
                    $partner->update(['photo_id' => null]);
                    $partner->photo->delete();
                }
                $photo = new Photo();
                $path = 'partners/' . $partner->id . '.' . $file->getClientOriginalExtension();
                Storage::put($path, file_get_contents($file->getPathname()));
                $path = '/storage/photo/' . $path;
                $photo->type = PhotoConnect::NEWS;
                $photo->sizeX = getimagesize($file->getPathname())[0];
                $photo->sizeY = getimagesize($file->getPathname())[1];
                $photo->path = $path;
                $photo->save();
                $partner->update(['photo_id' => $photo->id]);
            }
            return redirect()->route('partners_index');
        } elseif ($request->isMethod('get')) {
            return view('admin.partners.form');
        }
        return 0;
    }


    /**
     * @param $partnerId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function updatePartner($partnerId, Request $request)
    {
        if($request->isMethod('post')) {
            $partner = Partner::find($partnerId);
            $partner->link = $request->post('link');
            $partner->name = $request->post('name');
            $partner->category = $request->post('category');
            $partner->priority = $request->post('priority');
            if ($file = $request->file('photo')) {
                if($partner->cover_photo_id !== null) {
                    $partner->update(['photo_id' => null]);
                    $partner->photo->delete();
                }
                $photo = new Photo();
                $path = 'partners/' . $partner->id . '.' . $file->getClientOriginalExtension();
                Storage::put($path, file_get_contents($file->getPathname()));
                $path = '/storage/photo/' . $path;
                $photo->type = PhotoConnect::NEWS;
                $photo->sizeX = getimagesize($file->getPathname())[0];
                $photo->sizeY = getimagesize($file->getPathname())[1];
                $photo->path = $path;
                $photo->save();
                $partner->photo_id = $photo->id;
            }
            $partner->save();
            return redirect()->route('partners_index');

        } elseif ($request->isMethod('get')) {
            return view('admin.partners.form', [
                'partner' => Partner::find($partnerId),
            ]);
        };
        return 0;
    }

    /**
     * @param $partnerId
     * @return int
     */
    public function deletePartner($partnerId)
    {
        Partner::find($partnerId)->delete();
        return 1;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int|string
     */
    public function createAlbum(Request $request)
    {
        if($request->isMethod('post')) {
            $album = new Album();
            $album->name = $request->post('name');
            $album->save();
            if ($tags = $request->post('tags')) {
                $tagConnects = TagConnect::select('id')->where('connect_id', $album->id)->where('type', TagConnect::GALLERY);
                $tagsModels = Tag::whereIn('id', $tagConnects->get())->get();
                foreach ($tagsModels as $tag) {
                    $tag->update(['count_photos' => $tag->count_photos - 1]);
                }
                $tagConnects->delete();
                $tags = preg_split('/,/', $tags);
                foreach ($tags as $tag) {
                    $tagModel = Tag::where('word', $tag)->first();
                    if ($tagModel === null) {
                        $tagModel = new Tag();
                        $tagModel->word = $tag;
                        $tagModel->count_photos = 1;
                        $tagModel->save();
                    } else {
                        $tagModel->update(['count_photos', $tagModel->count_photos + 1]);
                    }
                    $tagConnect = new TagConnect();
                    $tagConnect->id = $tagModel->id;
                    $tagConnect->connect_id = $album->id;
                    $tagConnect->type = TagConnect::GALLERY;
                    $tagConnect->save();
                }
            }
            return redirect()->route('album_fill', ['id' => $album->id]);
        } elseif ($request->isMethod('get')) {
            return view('admin.gallery.form');
        };
        return 0;
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int|void
     */
    public function albumFill($id, Request $request)
    {
        $album = Album::find($id);
        if ($request->isMethod('post')) {

            $album->name = $request->post('name');
            if ($tags = $request->post('tags')) {
                $tags = preg_split('/,/', $tags);
                if(!(($tagConnects = TagConnect::photo($album->id))->isEmpty())) {
                    foreach ($tagConnects as $tagConnect) {
                        $tag = $tagConnect->tag;
                        $tag->update(['count_news' => $tag->count_news - 1]);
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
                        $tagModel->update(['count_news' => $tagModel->count_news + 1]);
                    }
                    $tagConnect = new TagConnect();
                    $tagConnect->id = $tagModel->id;
                    $tagConnect->connect_id = $article->id;
                    $tagConnect->type = TagConnect::NEWS;
                    $tagConnect->save();
                }
            }
            $files = $request->allFiles()['photos'];
            foreach ($files as $file) {
                $photo = new Photo();
                $photo->type = PhotoConnect::GALLERY;
                $photo->path = '';
                $photo->sizeX = getimagesize($file->getPathname())[0];
                $photo->sizeY = getimagesize($file->getPathname())[1];
                $photo->album_id = $id;
                $photo->save();
                $path = 'gallery/album_' . $id . '/' . $photo->id . '.' . $file->getClientOriginalExtension();
                Storage::put($path, file_get_contents($file->getPathname()));
                $path = '/storage/photo/' . $path;
                $photo->path = $path;
                $photo->save();
            }
            $album->save();
            return redirect()->route('album_fill', ['id' => $id]);

        } elseif ($request->isMethod('get')) {
            return view('admin.gallery.album_fill', [
                'album' => $album
        ]);
     }
     return 0;
    }

    /**
     * @param $id
     * @return int
     */
    public function deleteAlbum($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();
        return 1;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function createSubscriber(Request $request)
    {
        if($request->isMethod('post') && $request->ajax()) {
            $subscriber = new Subscriber();
            $subscriber->name = $request->post('name');
            $subscriber->email = $request->post('email');
            $subscriber->course = $request->post('course');
            $subscriber->faculty = $request->post('faculty');
            $subscriber->work = $request->post('work');
            $subscriber->post = $request->post('post');
            $subscriber->active = $request->post('active') === null ? false : true;
            $subscriber->save();
            return 1;
        } elseif ($request->isMethod('get')) {
            return view('admin.subscribers.form');
        }
        return 0;
    }


    /**
     * @param $subscriberId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|int
     */
    public function updateSubscriber($subscriberId, Request $request)
    {
        if($request->isMethod('post')) {
            $subscriber = Subscriber::find($subscriberId);
            $subscriber->name = $request->post('name');
            $subscriber->email = $request->post('email');
            $subscriber->course = $request->post('course');
            $subscriber->faculty = $request->post('faculty');
            $subscriber->work = $request->post('work');
            $subscriber->post = $request->post('post');
            $subscriber->active = $request->post('active') === null ? false : true;
            $subscriber->save();
            return redirect()->route('subscribers_index');
        } elseif ($request->isMethod('get')) {
            return view('admin.subscribers.form', [
                'subscriber' => Subscriber::find($subscriberId)
            ]);
        }
        return 0;
    }

    /**
     * @param $subscriberId
     * @return int
     */
    public function deleteSubscriber($subscriberId)
    {
        Subscriber::find($subscriberId)->delete();
        return 1;
    }
}
