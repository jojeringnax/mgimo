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
        $files = $_FILES['photo'];
        $file = file_get_contents($files['tmp_name']);
        $extension = substr($files['name'], strpos($files['name'], '.'), strlen($files['name']));
    }

}