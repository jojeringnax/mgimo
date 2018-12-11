<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 * @package App
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
     * @return bool|null
     */
   public function delete()
   {
       $this->coverPhoto->delete();
       return parent::delete();
   }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coverPhoto()
    {
        return $this->hasOne(Photo::class, 'id','cover_photo_id');
    }
}
