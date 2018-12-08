<?php
/**
 * Created by PhpStorm.
 * User: Броненосец
 * Date: 03.12.2018
 * Time: 11:22
 */

namespace App\Http\Controllers;


use App\Event;
use App\News;
use App\Photo;
use App\PhotoConnect;
use App\Tag;
use App\TagConnect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function createArticle(Request $request)
    {
        $news = new News();
        $news->title = $request->post('title');
        $news->content = $request->post('content');
        $news->moderated = true;
        $news->save();
        if($file = $request->file('photo')) {
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
            unset($file);
            unset($path);
            unset($photo);
        }
        $news->save();
        for($i=1;$i<=3;$i++) {
            if($file = $request->file('photo'.$i)) {
                $photo = new Photo();
                $path = '/news/' . $news->id . '_' . $i .'.' . $file->getClientOriginalExtension();
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
        if($tags = $request->post('tags')) {
            $tags = preg_split('/,/', $tags);
            foreach ($tags as $tag) {
                $tagModel = Tag::where('word',$tag)->first();
                if($tagModel === null) {
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
        return 'aa';
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
        $event = new Event();
        $event->content = $request->post('content');
        $event->date = $request->post('date');
        $event->main = $request->post('main') === null ? 0 : 1;
        $event->save();
        if($tags = $request->post('tags')) {
            $tags = preg_split('/,/', $tags);
            foreach ($tags as $tag) {
                $tagModel = Tag::where('word',$tag)->first();
                if($tagModel === null) {
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


}