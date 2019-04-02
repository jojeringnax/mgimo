<?php

namespace App\en;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class News
 * @package App
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $title
 * @property string $content
 * @property boolean $moderated
 * @property integer $main_photo_id
 * @property Photo $mainPhoto
 */
class News extends Model
{

    public $connection = 'mysql_en';

    const nameMonth = [
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December'
    ];

    /**
     * @var string
     */
    protected $table = 'news';

    /**
     * @var array
     */
    public $fillable = [
        'id',
        'title',
        'content',
        'moderated',
        'main_photo_id'
    ];


    /**
     * Delete all TagConnects decrease count_news of Tags, delete all Photos (main Photo included).
     * Delete Model from database.
     * @return bool|null
     */
    public function delete()
    {
        /**
         * @var $tags Tag[]
         * @var $tagConnects Builder
         */
        $tagConnects = TagConnect::select('id')->where('connect_id', $this->id)->where('type', TagConnect::NEWS);
        $photos = $this->getPhotos();
        $photo = $this->mainPhoto;
        $tags = Tag::whereIn('id', $tagConnects->get())->get();
        foreach ($tags as $tag) {
            $tag->update(['count_news' => $tag->count_news - 1]);
        }
        try {
            parent::delete();
        } catch (\Exception $exception) {
            //
        }
        if ($photos !== null) {
            foreach ($photos as $ph) {
                if ($ph !== null) {
                    try {
                        $ph->delete();
                    } catch (\Exception $exception) {
                        //
                    }
                }
            }
        }
        if ($photo !== null) {
            try {
                $photo->delete();
            } catch (\Exception $exception) {
                //
            }
        }
        if ($tagConnects !== null)
            $tagConnects->delete();
        return true;
    }


    /**
     * Return Photo model of main Photo of Model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mainPhoto()
    {
        return $this->hasOne(Photo::class, 'id','main_photo_id');
    }

    /**
     * Return all Photo model through PhotoConnects.
     *
     * @return Photo[]
     */
    public function getPhotos()
    {
        return Photo::getAllPhotosForArticle($this->id);
    }


    /**
     * Return all moderated News.
     *
     * @return mixed
     */
    public static function getModerated($limit=9, $offset=0)
    {
        return self::where('moderated', true)->orderBy('created_at', 'desc')->limit($limit)->skip($offset)->get();
    }

    /**
     * Return tags as array.
     *
     * @return array
     */
    public function getTag()
    {
        $connect = TagConnect::article($this->id)->first();
        return $connect === null ? null : $connect->tag->word;
    }

}
