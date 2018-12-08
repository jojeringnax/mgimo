<?php
/**
 * Created by PhpStorm.
 * User: Броненосец
 * Date: 09.12.2018
 * Time: 0:08
 */

namespace App\Http\Controllers;


use App\Event;
use App\News;
use App\Smi;

class SiteController extends Controller
{
    public function index()
    {
        $news = News::limit(3)->get();
        $events = Event::limit(6)->orderBy('date', 'asc')->get();
        $smis = Smi::limit(4)->get();
        return view('welcome', [
            'news' => $news,
            'events' => $events,
            'smis' => $smis
        ]);
    }

}