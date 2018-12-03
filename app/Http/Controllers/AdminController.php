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
            $photo->type = PHOTO::NEWS;
            $photo->sizeX = getimagesize($file->getPathname())[0];
            $photo->sizeY = getimagesize($file->getPathname())[1];
            $photo->path = $path;
            $photo->save();
        }
        $news->main_photo_id = $photo->id;
        $news->save();
        return var_dump($request);
    }


}