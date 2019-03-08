<?php
/**
 * Created by PhpStorm.
 * User: Броненосец
 * Date: 09.12.2018
 * Time: 0:08
 */

namespace App\Http\Controllers\en;


use App\en\Congratulation;
use App\en\Event;
use App\Http\Controllers\Controller;
use App\en\News;
use App\en\Partner;
use App\en\Smi;

class SiteController extends Controller
{
    public function index()
    {
        $news = News::getModerated(3);
        $events = Event::getModerated(6);
        $smis = Smi::limit(4)->orderBy('created_at', 'desc')->get();
        $congrats = Congratulation::getModerated();
        $partners = Partner::getInPriority();
        return view('welcome', [
            'news' => $news,
            'events' => $events,
            'smis' => $smis,
            'congratulations' => $congrats,
            'partners' => $partners
        ]);
    }

}