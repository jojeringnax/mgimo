<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'events';

    /**
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
     * @return array
     */
    public function getTags()
    {
        $tagConnects = TagConnect::event($this->id);
        if($tagConnects === null) {return [];}
        foreach($tagConnects as $tagConnect) {
            $idsArray[] = $tagConnect->id;
        }
        $tags = Tag::whereIn('id', $idsArray)->get();
        foreach($tags as $tag) {
            $resultArray[] = $tag->word;
        }
        return $resultArray;
    }
}
