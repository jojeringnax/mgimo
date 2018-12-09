<?php
/**
 * Created by PhpStorm.
 * User: Броненосец
 * Date: 03.12.2018
 * Time: 0:19
 */

namespace App\Http\Controllers;


use App\Photo;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function show()
    {
        //
    }

    public function delete($id)
    {
        Photo::find($id)->delete();
        return 'yes';
    }


}