<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoConnect extends Model
{
    protected $table = 'photo_connects';

    public $timestamps = false;

    const NEWS = 1;
    const BOOK = 2;
    const CONGRATULATION = 3;
    const GALLERY = 4;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function photo()
    {
        return $this->hasOne(Photo::class, 'id', 'id');
    }

    public static function article($id)
    {
        return self::select('id')->where('type', PhotoConnect::NEWS)->where('connect_id', $id)->get();
    }
}
