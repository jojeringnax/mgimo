<?php
/**
 * Created by PhpStorm.
 * User: Броненосец
 * Date: 03.12.2018
 * Time: 11:22
 */

namespace App\Http\Controllers;


use App\News;
use App\Photo;
use App\PhotoConnect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function createNews(Request $request)
    {
        $news = new News();
        $news->title = $request->post('title');
        $news->content = $request->post('content');
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
        return 'aa';
    }

    public function deleteArticle($articleId)
    {
        News::find();
    }


}