<?php

namespace App\Http\Controllers\Api;

use App\en\Congratulation;
use App\en\News;
use App\en\Photo;
use App\en\PhotoConnect;
use App\en\Subscriber;
use App\en\Tag;
use App\en\TagConnect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{
    public function createArticle(Request $request)
    {
        if(!$request->ajax()) {
            return redirect('/');
        }
        $article = new News();
        $article->title = $request->post('title');
        $article->content = $request->post('content');
        $article->moderated = 0;
        $article->save();
        if ($file = $request->file('photo')) {
            $photo = new Photo();
            $path = 'news/' . $article->id . '.' . $file->getClientOriginalExtension();
            Storage::put($path, file_get_contents($file->getPathname()));
            $path = '/storage/photo/' . $path;
            $photo->type = PhotoConnect::NEWS;
            $photo->sizeX = getimagesize($file->getPathname())[0];
            $photo->sizeY = getimagesize($file->getPathname())[1];
            $photo->path = $path;
            $photo->save();
            $article->main_photo_id = $photo->id;
            $article->update(['main_photo_id' => $photo->id]);
        }
        for ($i = 1; $i <= 3; $i++) {
            if ($file = $request->file('photo' . $i)) {
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
    }



    public function createSubscriber(Request $request)
    {
        if(!$request->ajax()) {
            return redirect('/');
        }
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
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function createCongratulation(Request $request)
    {
        $congratulation = new Congratulation();
        $congratulation->moderated = 0;
        $congratulation->title = $request->post('title');
        $congratulation->content = $request->post('content');
        $congratulation->date = $request->post('date');
        $congratulation->priority = 5;
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
        return $congratulation->toJson();
    }
}
