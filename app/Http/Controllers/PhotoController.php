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

class PhotoController extends Controller
{
    public function index()
    {
        return view('gallery.index', [
            'albums' => Album::all()
        ]);
    }

    public function show($id)
    {
        return view('gallery.show', [
            'album' => Album::find($id)
        ]);
    }

    public function delete($id)
    {
        Photo::find($id)->delete();
        return 'yes';
    }


}