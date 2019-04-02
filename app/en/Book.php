<?php

namespace App\en;

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
 * @property int $status
 * @property string $link
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
        'id',
        'title',
        'description',
        'cover_photo_id',
        'link',
        'status',
        'price'
    ];

    /**
     * @return bool|null
     * @throws \Exception
     */
   public function delete()
   {
       $coverPhoto = $this->coverPhoto;
       try {
           parent::delete();
       } catch (\Exception $exception) {
           //
       }
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
