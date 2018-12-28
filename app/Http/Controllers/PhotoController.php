<?php
/**
 * Created by PhpStorm.
 * User: Броненосец
 * Date: 03.12.2018
 * Time: 0:19
 */

namespace App\Http\Controllers;


use App\Album;
use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        return view('gallery.index', [
            'albums' => Album::limit(4)->get()
        ]);
    }

    public function show($id)
    {
        return view('gallery.show', [
            'album' => Album::find($id)
        ]);
    }

    public function delete($id, Request $request)
    {
        $from = $request->get('from');
        $photo = Photo::find($id);
        $photoConnect = $photo->photoConnect;
        if($from === 'news') {
            $articleId = $photoConnect->connect_id;
            $photo->delete();
            return redirect()->action('AdminController@updateArticle', ['articleId' => $articleId]);
        }
        return 'yes';
    }

    public function deletePhotos(Request $request)
    {
        if($request->ajax()) {
            $photos = Photo::whereIn('id', $request->data)->delete();
            return $photos;
        }
        return false;
    }


    public function addAlbums($data, Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }
        $albums = Album::limit(4)->skip($data)->get();
        foreach ($albums as $album) {
            $resultArray[] = [
                'id' => $album->id,
                'link' => url('gallery/show', ['id' => $album->id]),
                'photo' => Photo::where('album_id', $album->id)->first()->path,
                'name' => $album->name
            ];
        }
        return isset($resultArray) ? $resultArray : 0;
    }


}