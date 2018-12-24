<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 * @package App
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $title
 * @property string $description
 * @property int $cover_photo_id
 * @property Photo $coverPhoto
 * @property int $price
 *
 */
class Book extends Model
{

    /**
     * @var string
     */
   protected $table = 'books';

    /**
     * @var array
     */
   protected $fillable = [
     'cover_photo_id'
   ];

    /**
     * Delete cover photo for evade a relative exception.
     * Delete the model from database.
     *
     * @return bool|null
     */
   public function delete()
   {
       $coverPhoto = $this->coverPhoto;
       parent::delete();
       return $coverPhoto->delete();
   }

    /**
     * Return model Photo, which is the cover photo for Book-model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coverPhoto()
    {
        return $this->hasOne(Photo::class, 'id','cover_photo_id');
    }
}
