<?php
/**
 * Created by PhpStorm.
 * User: Броненосец
 * Date: 08.12.2018
 * Time: 12:11
 */

namespace App\Http\Controllers;


use App\Event;

class EventsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('events.index', ['events' => Event::all()]);
    }
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', [
            'event' => $event,
            'eventPhotos' => $event->getPhotos()
        ]);
    }

}