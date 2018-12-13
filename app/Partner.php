<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $table = 'partners';


    public $fillable = [
      'photo_id'
    ];

    public function photo()
    {
        return $this->hasOne(Photo::class, 'id','photo_id');
    }

    public static function getInPriority()
    {
        return self::all()->sortBy('priority');
    }
}
