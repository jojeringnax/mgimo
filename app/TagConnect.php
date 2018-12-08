<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagConnect extends Model
{
    protected $table = 'tag_connects';

    const NEWS = 1;
    const EVENTS = 2;
    const GALLERY = 3;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tag()
    {
        return $this->hasOne(Tag::class, 'id','id');
    }

    /**
     * @param $id
     * @return self[] | null
     */
    public static function article($id)
    {
        return self::where('type', TagConnect::NEWS)->where('connect_id', $id)->get();
    }

    /**
     * @param $id
     * @return self[] | null
     */
    public static function photo($id)
    {
        return self::where('type', TagConnect::GALLERY)->where('connect_id', $id)->get();
    }

    /**
     * @param $id
     * @return self[] | null
     */
    public static function event($id)
    {
        return self::where('type', TagConnect::EVENTS)->where('connect_id', $id)->get();
    }
}
