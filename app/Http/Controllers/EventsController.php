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
        return view('events.index', ['events' => Event::getModerated()]);
    }


    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', [
            'event' => $event,
            'eventPhotos' => $event->getPhotos()
        ]);
    }


    public function addEvents($data)
    {
        $events = Event::getModerated(12, $data);
        foreach($events as $event) {
            $resultArray[] = [
                'id' => $event->id,
                'title' => $event->title,
                'date' => $event->date,
                'link' => url('events/show', ['id' => $event->id]),
                'location' => $event->location
            ];
        }
        return isset($resultArray) ? json_encode($resultArray, JSON_UNESCAPED_UNICODE) : 0;
    }

}