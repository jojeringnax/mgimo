<?php
/**
 * Created by PhpStorm.
 * User: Броненосец
 * Date: 09.12.2018
 * Time: 0:08
 */

namespace App\Http\Controllers;


use App\Congratulation;
use App\Event;
use App\News;
use App\Partner;
use App\Smi;

class SiteController extends Controller
{
    public function index()
    {
        $news = News::limit(3)->get();
        $events = Event::limit(8)->orderBy('date', 'asc')->get();
        $smis = Smi::limit(4)->get();
        $congrats = Congratulation::limit(4)->get();
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