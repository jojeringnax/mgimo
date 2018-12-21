<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class Photo
 * @package App
 *
 * @property integer $id
 * @property integer $sizeX
 * @property integer $sizeY
 * @property string $path
 * @property integer $type
 * @property int $album_id
 * @property boolean $video
 * @property PhotoConnect $photoConnect
 *
 */
class Photo extends Model
{
    /**
     * @var string
     */
    protected $table = 'photos';


    /**
     * @var bool
     */
    public $timestamps = false;


    /**
     * @var array
     */
    public $fillable = [
      'album_id'
    ];

    /**
     * Delete file of photo.
     * Delete all TagConnects and decrease count_photos of Tag.
     * Delete Model from database.
     *
     * @return bool|null
     */
    public function delete()
    {
        $array = preg_split('/\//', $this->path);
        $path = implode('\/', array($array[3], $array[4]));
        Storage::disk('local')->delete($path);
        $tagConnects = TagConnect::select('id')->where('connect_id', $this->id)->where('type', TagConnect::GALLERY);
        $tags = Tag::whereIn('id', $tagConnects->get())->get();
        foreach ($tags as $tag) {
            $tag->update(['count_photos' => $tag->count_photos - 1]);
        }
        if (!$tagConnects->get()->isEmpty()) {$tagConnects->delete();};
        return parent::delete();
    }


    /**
     * Return Model of PhotoConnect.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne | PhotoConnect
     */
    public function photoConnect()
    {
        return $this->hasOne(PhotoConnect::class, 'id', 'id');
    }


    /**
     * Return Album in which this photo save.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function album()
    {
        return $this->hasOne(Album::class, 'id','album_id');
    }

    /**
     * Return all photo Models for an article by id.
     *
     * @param $articleId
     * @return self[]
     */
    public static function getAllPhotosForArticle($articleId)
    {
        $photoConnects = PhotoConnect::select('id')->where('type', PhotoConnect::NEWS)->where('connect_id', $articleId)->get();
        return self::whereIn('id', $photoConnects)->get();
    }

    /**
     * Return all photo Models for an event by id.
     *
     * @param $eventId
     * @return self[]
     */
    public function getAllPhotosForEvent($eventId)
    {
        $photoConnects = PhotoConnect::select('id')->where('type', PhotoConnect::EVENT)->where('connect_id', $eventId)->get();
        return self::whereIn('id', $photoConnects)->get();
    }

    /**
     * return all tags as array.
     *
     * @return array
     */
    public function getTags()
    {
        $resultArray = [];
        $tagConnects = TagConnect::article($this->id);
        if($tagConnects->isEmpty()) {return [];}
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
