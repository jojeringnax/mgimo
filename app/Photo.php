<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
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
        'id',
        'sizeX',
        'sizeY',
        'path',
        'type',
        'album_id',
        'video'
    ];

    /**
     * @return bool|null
     * @throws \Exception
     */
    public function delete()
    {
        $array = preg_split('/\//', $this->path);
        $path = implode('\/', array($array[3], $array[4]));
        Storage::disk('local')->delete($path);
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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne|Album
     */
    public function album()
    {
        return $this->hasOne(Album::class, 'id','album_id');
    }

    /**
     * Return all photo Models for an article by id.
     *
     * @param $articleId integer
     * @return self[]
     */
    public static function getAllPhotosForArticle($articleId)
    {
        $photoConnects = PhotoConnect::select('id')->where('type', PhotoConnect::NEWS)->where('connect_id', $articleId)->get();
        return self::whereIn('id', $photoConnects)->get();
    }

    /**
     * @param $congId integer
     * @return self[]
     */
    public static function getAllPhotosForCongratulation($congId)
    {
        $photoConnects = PhotoConnect::select('id')->where('type', PhotoConnect::CONGRATULATION)->where('connect_id', $congId)->get();
        return self::whereIn('id', $photoConnects)->get();
    }

    /**
     * Return all photo Models for an event by id.
     *
     * @param $eventId integer
     * @return self[]
     */
    public static function getAllPhotosForEvent($eventId)
    {
        $photoConnects = PhotoConnect::select('id')->where('type', PhotoConnect::EVENT)->where('connect_id', $eventId)->get();
        return self::whereIn('id', $photoConnects)->get();
    }

    /**
     * @param $file UploadedFile
     * @param $type
     * @param $path
     * @param int $video
     * @param null $albumID
     * @return int
     */
    public static function savePhotoFromRequestFile($file, $type, $path, $video=0, $albumID = null)
    {
        $photo = new self;
        Storage::put($path, file_get_contents($file->getPathname()));
        $path = '/storage/photo' . $path;
        $photo->type = $type;
        $photo->sizeX = getimagesize($file->getPathname())[0];
        $photo->sizeY = getimagesize($file->getPathname())[1];
        $photo->path = $path;
        $photo->album_id = $albumID;
        $photo->video = $video;
        $photo->save();
        return $photo->id;
    }

}
