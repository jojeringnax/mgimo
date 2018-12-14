<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $table = 'albums';



    public function delete()
    {
        foreach ($this->photos as $photo) {
            $photo->delete();
        }
        parent::delete();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class, 'album_id', 'id');
    }
}
