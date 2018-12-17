<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Album
 * @package App
 *
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class Album extends Model
{
    /**
     * @var string
     */
    public $table = 'albums';


    /**
     * Delete all connected photos.
     * Delete the model from the database.
     *
     * @return bool|null
     */
    public function delete()
    {
        foreach ($this->photos as $photo) {
            $photo->delete();
        }
        return parent::delete();
    }

    /**
     * Return all photos in album as array of Photo models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class, 'album_id', 'id');
    }
}
