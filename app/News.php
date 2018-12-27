<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    /**
     * @var string
     */
    protected $table = 'news';

    /**
     * @var array
     */
    public $fillable = ['main_photo_id'];


    /**
     * Delete all TagConnects decrease count_news of Tags, delete all Photos (main Photo included).
     * Delete Model from database.
     * return bool|null
     */
    public function delete()
    {
        $tagConnects = TagConnect::select('id')->where('connect_id', $this->id)->where('type', TagConnect::NEWS);
        $photos = $this->getPhotos();
        $photo = $this->mainPhoto;
        $tags = Tag::whereIn('id', $tagConnects->get())->get();
        foreach ($tags as $tag) {
            $tag->update(['count_news' => $tag->count_news - 1]);
        }
        parent::delete();
        foreach($photos as $ph) {
            $ph->delete();
        }
        $photo->delete();
        return $tagConnects->delete();
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
    public static function getModerated($limit=3, $offset=0)
    {
        return self::where('moderated', true)->limit($limit)->skip($offset)->get();
    }

    /**
     * Return tags as array.
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
