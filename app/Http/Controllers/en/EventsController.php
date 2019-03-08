<?php
/**
 * Created by PhpStorm.
 * User: Броненосец
 * Date: 08.12.2018
 * Time: 12:11
 */

namespace App\Http\Controllers\en;


use App\en\Event;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('events.index', [
            'events' => Event::getModerated(),
            'eventsNumber' => Event::all()->count(),
            'locations' => Event::getAllLocations()
        ]);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', [
            'event' => $event,
            'eventPhotos' => $event->getPhotos()
        ]);
    }


    /**
     * @param $data
     * @return int|string
     */
    public function addEvents($data)
    {
        $events = Event::getModerated(12, $data);
        foreach($events as $event) {
            $resultArray[] = [
                'id' => $event->id,
                'title' => $event->title,
                'date' => $event->getDatesAsString(),
                'link' => url('events/show', ['id' => $event->id]),
                'location' => $event->location
            ];
        }
        return isset($resultArray) ? json_encode($resultArray, JSON_UNESCAPED_UNICODE) : 0;
    }

    /**
     * @param $location
     * @return mixed
     */
    public function getByLocation($location)
    {
        return Event::getEventsForLocation($location)->toJson();
    }

}