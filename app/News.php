<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $attributes = [
        'main_photo_id' => null,
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mainPhoto()
    {
        return $this->hasOne(Photo::class, 'id','main_photo_id');
    }

    /**
     * @return Photo[]
     */
    public function getPhotos()
    {
        $photoConnects = PhotoConnect::article($this->id);
        return Photo::whereIn('id', $photoConnects)->get();
    }

}
