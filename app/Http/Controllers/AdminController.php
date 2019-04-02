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
     * @param News $article
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|int
     */
    public function storeArticle(News $article, Request $request)
    {
        $article->fill($request->post());
        $article->moderated = $request->ajax() ? false : $request->post('moderated') === null ? false : true;
        $article->save();
        if ($file = $request->file('photo')) {
            $path = '/news/' . $article->id . '.' . $file->getClientOriginalExtension();
            try {
                $article->update(['main_photo_id' => Photo::savePhotoFromRequestFile($file, PhotoConnect::NEWS, $path)]);
            } catch (\Exception $e) {
                //
            }
        }
        for ($i = 1; $i <= 3; $i++) {
            if ($file = $request->file('photo' . $i)) {
                $path = '/news/' . $article->id . '_' . $i . '.' . $file->getClientOriginalExtension();
                $photoId = Photo::savePhotoFromRequestFile($file, PhotoConnect::NEWS, $path);
                $photoConnect = new PhotoConnect();
                $photoConnect->id = $photoId;
                $photoConnect->connect_id = $article->id;
                $photoConnect->type = PhotoConnect::NEWS;
                $photoConnect->save();
            }
        }
        $tag = $request->post('tags');
        /**
         * @var $tagModel Tag|null
         */
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
        if($request->ajax()) {
            return 1;
        }
        return redirect()->route('news_index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function createArticle(Request $request)
    {
        if ($request->isMethod('post')) {
            return $this->storeArticle(new News(), $request);
        } else {
            return view('admin.news.form');
        }
    }


    /**
     * @param $articleId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|int
     * @throws \Exception
     */
    public function updateArticle($articleId, Request $request)
    {
        /**
         * @var $article News
         */
        $article = News::find($articleId);
        if ($request->isMethod('post')) {
            if ($request->file('photo')) {
                $photo = $article->mainPhoto;
                $article->update(['main_photo_id' => null]);
                try{
                    $photo->delete();
                } catch (\Exception $exception) {
                    //
                }
            }
            $tag = $article->getTag();
            /**
             * @var $tagModel Tag|null
             */
            if ($request->post('tags') !== $tag) {
                $tagModel = Tag::where('word', $tag)->first();
                $tagModel->count_news -= 1;
                $tagModel->save();
                TagConnect::where('connect_id', $article->id)->where('type', TagConnect::NEWS)->delete();
            }
            return $this->storeArticle($article, $request);
        } elseif ($request->isMethod('get')) {
            return view('admin.news.form', [
                'article' => $article,
                'photos' => $article->getPhotos()
            ]);
        }
        return '0';
    }

    /**
     * @param $articleId
     * @return int
     */
    public function deleteArticle($articleId)
    {
        try{
            News::find($articleId)->delete();
        } catch (\Exception $exception) {
            //
        }
        return redirect()->route('news_index');
    }

    /**
     * @param Event $event
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function storeEvent(Event $event, Request $request)
    {
        $main = $request->post('main') === null ? 0 : 1;
        if ($request->ajax()) {
            $main = 0;
            $this->middleware('guest');
        }
        $event->fill($request->post());
        $event->main = $main;
        $event->save();
        if (!empty($request->allFiles())) {
            $files = $request->allFiles()['photos'] ? $request->allFiles()['photos'] : [];
            $i = 0;
            foreach ($files as $file) {
                $i++;
                $path = '/events/' . $event->id . '_' . $i . '.' . $file->getClientOriginalExtension();
                $photoId = Photo::savePhotoFromRequestFile($file, PhotoConnect::EVENT, $path);
                $photoConnect = new PhotoConnect();
                $photoConnect->id = $photoId;
                $photoConnect->connect_id = $event->id;
                $photoConnect->type = PhotoConnect::EVENT;
                $photoConnect->save();
            }
        }
        $event->update(['main_photo_id' => $request->post('main_photo_id')]);
        return $request->ajax() ? json_encode($event) : redirect()->route('events_index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function createEvent(Request $request)
    {
        if($request->isMethod('post')) {
            $event = new Event();
            return $this->storeEvent($event, $request);
        } elseif ($request->isMethod('get')) {
            return view('admin.events.form');
        }
        return "0";
    }


    /**
     * @param $eventId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function updateEvent($eventId, Request $request)
    {
        /**
         * @var $event Event
         */
        $event = Event::find($eventId);
        if($request->isMethod('post')) {
            if (!empty($request->allFiles())) {
                $photos = $event->getPhotos();
                foreach ($photos as $photo) {
                    try{
                        $photo->delete();
                    } catch (\Exception $exception) {
                        //
                    };
                }
            }
            return $this->storeEvent($event, $request);
        } elseif ($request->isMethod('get')) {
            return view('admin.events.form', [
                'event' => $event,
            ]);
        }
        return '0';
    }


    /**
     * @param $eventId
     * @return int
     */
    public function deleteEvent($eventId)
    {
        try {
            Event::find($eventId)->delete();
        } catch (\Exception $exception) {
            //
        }
        return redirect()->route('events_index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function addFileEvents(Request $request)
    {
        if(!$request->post()) {
            return redirect('/admin/partners');
        }
        $file = $request->file('event-gr');
        $fileModel = Event::getMainFilePhotoModel();
        if ($fileModel !== null) {
            try{
                $fileModel->delete();
            } catch (\Exception $exception) {
                //
            }
        }
        $fileModel = new Photo();
        $fileModel->type = PhotoConnect::MAIN_PHOTO_EVENTS;
        $fileModel->sizeX = 1;
        $fileModel->sizeY = 1;
        $path = 'events/main_file.'.$file->getClientOriginalExtension();
        Storage::put($path, file_get_contents($file->getPathname()));
        $fileModel->path = '/storage/photo/' . $path;
        $fileModel->save();
        return redirect('/admin/events');
    }

    /**
     * @param Smi $smi
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeSmi(Smi $smi, Request $request)
    {
        $smi->fill($request->post());
        $smi->save();
        return redirect()->route('smis_index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|string
     */
    public function createSmi(Request $request)
    {
        if($request->isMethod('post')) {
            return $this->storeSmi(new Smi(), $request);
        } elseif ($request->isMethod('get')) {
            return view('admin.smis.form');
        }
        return '0';
    }


    /**
     * @param $smiId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|string
     */
    public function updateSmi($smiId, Request $request)
    {
        /**
         * @var $smi Smi
         */
        $smi = Smi::find($smiId);
        if($request->isMethod('post')) {
            return $this->storeSmi($smi, $request);
        } elseif ($request->isMethod('get')) {
            return view('admin.smis.form', [
                'smi' => $smi,
            ]);
        };
        return '0';
    }

    /**
     * @param $smiId
     * @return int
     */
    public function deleteSmi($smiId)
    {
        try {
            Smi::find($smiId)->delete();
        } catch (\Exception $exception) {
            //
        }
        return redirect()->route('smis_index');
    }


    /**
     * @param Congratulation $congratulation
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function storeCongratulation(Congratulation $congratulation, Request $request)
    {
        $moderated = $request->post('moderated') === null ? 0 : 1;
        $priority = $request->post('priority');
        if($request->ajax()) {
            $this->middleware('guest');
            $moderated = 0;
            $priority = 1;
        }
        $congratulation->fill($request->post());
        $congratulation->moderated = $moderated;
        $congratulation->priority = $priority;
        if ($file = $request->file('file')) {
            $path = '/congratulations/' . $congratulation->id . '.' . $file->getClientOriginalExtension();
            $video = (boolean) strpos('video', $_FILES['file']['type']);
            $photoId = Photo::savePhotoFromRequestFile($file, PhotoConnect::CONGRATULATION, $path, $video);
            $congratulation->main_photo_id = $photoId;
        }
        $congratulation->save();
        if(isset($request->allFiles()['photos'])) {
            $files = $request->allFiles()['photos'];
            $i = 0;
            foreach ($files as $file) {
                $i++;
                $path = '/congratulations/' . $congratulation->id . '_' . $i . '.' . $file->getClientOriginalExtension();
                $photoId = Photo::savePhotoFromRequestFile($file, PhotoConnect::CONGRATULATION, $path);
                $photoConnect = new PhotoConnect();
                $photoConnect->id = $photoId;
                $photoConnect->type = PhotoConnect::CONGRATULATION;
                $photoConnect->connect_id = $congratulation->id;
                $photoConnect->save();
            }
        }
        return $request->ajax() ? json_encode($congratulation) : redirect()->route('congratulations_index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|string
     */
    public function createCongratulation(Request $request)
    {
        if($request->isMethod('post')) {
            $congratulation = new Congratulation();
            return $this->storeCongratulation($congratulation, $request);
        } elseif ($request->isMethod('get')) {
            return view('admin.congratulations.form');
        }
        return '0';
    }

    /**
     * @param Request $request
     * @param $congratulationId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|string
     */
    public function updateCongratulation(Request $request, $congratulationId)
    {
        /**
         * @var $congratulation Congratulation
         */
        $congratulation = Congratulation::find($congratulationId);
        if($request->isMethod('post')) {
            if ($request->file('file')) {
                $file = $congratulation->mainPhoto;
                $congratulation->update(['main_photo_id' => null]);
                try{
                    $file->delete();
                } catch (\Exception $exception) {
                    //
                }
            }
            if(isset($request->allFiles()['photos'])) {
                $photos = $congratulation->getPhotos();
                foreach ($photos as $photo) {
                    try {
                        $photo->delete();
                    } catch (\Exception $exception) {
                        //
                    }
                }
            }
            return $this->storeCongratulation($congratulation, $request);
        } elseif ($request->isMethod('get')) {
            return view('admin.congratulations.form', [
                'congratulation' => $congratulation,
            ]);
        }
        return '0';
    }


    /**
     * @param $congratulationId
     * @return int
     */
    public function deleteCongratulation($congratulationId)
    {
        $congratulation = Congratulation::find($congratulationId);
        try {
            $congratulation->delete();
        } catch (\Exception $exception) {
            //
        }
        return redirect()->route('congratulations_index');
    }

    public function storeBook(Book $book, Request $request)
    {
        $book->fill($request->post());
        if ($file = $request->file('photo')) {
            $path = '/books/' . $book->id . '.' . $file->getClientOriginalExtension();
            $photoId = Photo::savePhotoFromRequestFile($file, PhotoConnect::BOOK, $path);
            $book->cover_photo_id = $photoId;
        }
        $book->save();
        return redirect()->route('books_index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function createBook(Request $request)
    {
        if($request->isMethod('post')) {
            return $this->storeBook(new Book, $request);
        } elseif ($request->isMethod('get')) {
            return view('admin.books.form');
        }
        return '0';
    }

    /**
     * @param $bookId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|string
     */
    public function updateBook($bookId, Request $request)
    {
        /**
         * @var $book Book
         */
        $book = Book::find($bookId);
        if($request->isMethod('post')) {
            if ($file = $request->file('photo')) {
                $book->update(['cover_photo_id' => null]);
                try {
                    $book->coverPhoto->delete();
                } catch (\Exception $exception) {
                    //
                }
            }
            return $this->storeBook($book, $request);
        } elseif ($request->isMethod('get')) {
            return view('admin.books.form', [
                'book' => $book
            ]);
        };
        return '0';
    }

    /**
     * @param $bookId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteBook($bookId)
    {
        $book = Book::find($bookId);
        try {
            $book->delete();
        } catch (\Exception $exception) {
            //
        }
        return redirect()->route('books_index');
    }

    /**
     * @param Partner $partner
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePartner(Partner $partner, Request $request)
    {
        $partner->fill($request->post());
        if ($file = $request->file('photo')) {
            $path = '/partners/' . $partner->id . '.' . $file->getClientOriginalExtension();
            $photoId = Photo::savePhotoFromRequestFile($file, PhotoConnect::PARTNER, $path);
            $partner->photo_id = $photoId;
        }
        $partner->save();
        return redirect()->route('partners_index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|string
     */
    public function createPartner(Request $request)
    {
        if($request->isMethod('post')) {
            return $this->storePartner(new Partner(), $request);
        } elseif ($request->isMethod('get')) {
            return view('admin.partners.form');
        }
        return '0';
    }


    /**
     * @param $partnerId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|string
     */
    public function updatePartner($partnerId, Request $request)
    {
        /**
         * @var $partner Partner
         */
        $partner = Partner::find($partnerId);
        if($request->isMethod('post')) {
            if ($file = $request->file('photo')) {
                if($partner->photo_id !== null) {
                    $partner->update(['photo_id' => null]);
                    try{
                        $partner->photo->delete();
                    } catch (\Exception $exception) {
                        //
                    }
                }
            }
            return $this->storePartner($partner, $request);
        } elseif ($request->isMethod('get')) {
            return view('admin.partners.form', [
                'partner' => $partner,
            ]);
        };
        return '0';
    }

    /**
     * @param $partnerId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletePartner($partnerId)
    {
        try {
            Partner::find($partnerId)->delete();
        } catch (\Exception $exception) {
            //
        }
        return redirect()->route('partners_index');
    }


    public function storeAlbum(Album $album, Request $request)
    {
        $album->name = $request->post('name');
        $album->save();
        $tag = Tag::where('word', $request->post('tags'))->first();
        if ($tag == null) {
            $tag = new Tag;
            $tag->word = $request->post('tags');
            $tag->count_photos = 1;
            $tag->save();
        }
        $tagConnect = new TagConnect();
        $tagConnect->id = $tag->id;
        $tagConnect->connect_id = $album->id;
        $tagConnect->type = TagConnect::GALLERY;
        $tagConnect->save();
        return redirect()->route('album_fill', ['id' => $album->id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|string
     */
    public function createAlbum(Request $request)
    {
        if($request->isMethod('post')) {
            return $this->storeAlbum(new Album(), $request);
        } elseif ($request->isMethod('get')) {
            return view('admin.gallery.form');
        };
        return '0';
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|int
     * @throws \Exception
     */
    public function albumFill($id, Request $request)
    {
        /**
         * @var $album Album
         */
        $album = Album::find($id);
        if ($request->isMethod('post')) {
            $album->name = $request->post('name');
            $tagNew = Tag::where('word', $request->post('tags'))->first();
            if ($tagNew == null) {
                $tagNew = new Tag;
                $tagNew->word = $request->post('tags');
                $tagNew->save();
            }
            /**
             * @var $tagConnect TagConnect
             */
            $tagConnect = TagConnect::where('id', $tagNew->id)->where('connect_id', $id)->where('type', TagConnect::GALLERY)->first();
            if($tagConnect === null) {
                $tagConnect = new TagConnect();
                $tagConnect->id = $tagNew->id;
                $tagConnect->connect_id = $id;
                $tagConnect->type = TagConnect::GALLERY;
                $tagConnect->save();
            } else {
                /**
                 * @var $tagCurrent Tag
                 */
                $tagCurrent = Tag::find($tagConnect->id);
                $tagCurrent->count_photos = $tagCurrent->count_photos - 1;
                $tagCurrent->save();
                $tagConnect->update(['id' => $tagNew->id]);
                $tagNew->count_photos = $tagNew->count_photos + 1;
                $tagNew->save();
            }
            if (isset($request->allFiles()['photos'])) {
                $files = $request->allFiles()['photos'];
                $i = 0;
                foreach ($files as $file) {
                    $i++;
                    $path = '/gallery/album_' . $id . '/' . $i . '.' . $file->getClientOriginalExtension();
                    Photo::savePhotoFromRequestFile($file, PhotoConnect::GALLERY, $path,0,$id);
                }
            }
            $album->save();
            return redirect()->route('album_fill', ['id' => $id]);

        } elseif ($request->isMethod('get')) {
            return view('admin.gallery.album_fill', [
                'album' => $album
            ]);
        }
    return redirect()->route('album_index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAlbum($id)
    {
        /**
         * @var $album Album
         */
        $album = Album::findOrFail($id);
        try {
            $album->delete();
        } catch (\Exception $exception) {
            //
        }
        return redirect()->route('album_index');
    }

    /**
     * @param Subscriber $subscriber
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeSubscriber(Subscriber $subscriber, Request $request)
    {
        $subscriber->fill($request->post());
        $subscriber->save();
        return redirect()->route('subscribers_index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|string
     */
    public function createSubscriber(Request $request)
    {
        if($request->isMethod('post')) {
            return $this->storeSubscriber(new Subscriber(), $request);
        } elseif ($request->isMethod('get')) {
            return view('admin.subscribers.form');
        }
        return '0';
    }


    /**
     * @param $subscriberId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|string
     */
    public function updateSubscriber($subscriberId, Request $request)
    {
        /**
         * @var $subscriber Subscriber
         */
        $subscriber = Subscriber::find($subscriberId);
        if($request->isMethod('post')) {
            return $this->storeSubscriber($subscriber, $request);
        } elseif ($request->isMethod('get')) {
            return view('admin.subscribers.form', [
                'subscriber' => $subscriber
            ]);
        }
        return '0';
    }

    /**
     * @param $subscriberId
     * @return int
     */
    public function deleteSubscriber($subscriberId)
    {
        /**
         * @var $subscriber Subscriber
         */
        $subscriber = Subscriber::find($subscriberId);
        try {
            $subscriber->delete();
        } catch (\Exception $exception)
        {
            //
        }
        return redirect()->route('subscribers_index');
    }
}
