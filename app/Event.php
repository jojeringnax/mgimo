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
     * Delete all TagConnects and decrease count_events in Tag model.
     * Delete Model from database.
     *
     * @return bool|null
     */
    public function delete()
    {
        $tagConnects = TagConnect::select('id')->where('connect_id', $this->id)->where('type', TagConnect::EVENTS);

        $tags = Tag::whereIn('id', $tagConnects->get())->get();
        foreach ($tags as $tag) {
            $tag->count_events = $tag->count_events - 1;
            $tag->save();
        }
        $tagConnects->delete();
        return parent::delete();
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
}
