<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * @package App
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $title
 * @property string $content
 * @property string $date
 * @property boolean $main
 * @property string $location
 */
class Event extends Model
{

    /**
     * @var string
     */
    protected $table = 'events';


    /**
     * @var array
     */
    public $fillable = ['main_photo_id'];

    /**
     * Delete all TagConnects and decrease count_events in Tag model.
     * Delete Model from database.
     *
     * @return bool|null
     */
    public function delete()
    {
        $tagConnects = TagConnect::select('id')->where('connect_id', $this->id)->where('type', TagConnect::EVENTS);
        $photos = $this->getPhotos();
        $tags = Tag::whereIn('id', $tagConnects->get())->get();
        foreach ($tags as $tag) {
            $tag->count_events = $tag->count_events - 1;
            $tag->save();
        }
        $tagConnects->delete();
        parent::delete();
        foreach($photos as $ph) {
            $ph->delete();
        }
        return true;
    }

    /**
     * Return Tags in array.
     *
     * @return array
     */
    public function getTags()
    {
        $tagConnects = TagConnect::event($this->id);
        if($tagConnects === null) {return [];}
        foreach($tagConnects as $tagConnect) {
            $idsArray[] = $tagConnect->id;
        }
        if(!isset($idsArray))
            return [];
        $tags = Tag::whereIn('id', $idsArray)->get();
        foreach($tags as $tag) {
            $resultArray[] = $tag->word;
        }
        return $resultArray;
    }

    /**
     * Return all Photo model through PhotoConnects.
     *
     * @return Photo[]
     */
    public function getPhotos()
    {
        return Photo::getAllPhotosForEvent($this->id);
    }

    /**
     * @param $limit
     * @param $offset
     * @return mixed
     */
    public static function getModerated($limit=12, $offset=0)
    {
        return self::where('main', true)->orderBy('date', 'asc')->limit($limit)->skip($offset)->get();
    }

    /**
     * @return array
     */
    public static function getAllLocations()
    {
        $events = self::all();
        $resultArray = [];
        foreach ($events as $event) {
            if (!in_array($event->location, $resultArray)) {
                $resultArray[] = $event->location;
            }
        }
        return $resultArray;
    }


    /**
     * @param $location
     * @return mixed
     */
    public static function getEventsForLocation($location)
    {
        return self::where('location', $location)->where('main', true)->get();
    }

    /**
     * @return Photo
     */
    public static function getMainFilePhotoModel()
    {
        return Photo::where('type', PhotoConnect::MAIN_PHOTO_EVENTS)->first();
    }
}
