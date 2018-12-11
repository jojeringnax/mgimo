<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App
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


    public function delete()
    {
        $tagConnects = TagConnect::select('id')->where('connect_id', $this->id)->where('type', TagConnect::NEWS);
        $photos = $this->getPhotos();
        $photo = $this->mainPhoto;
        $tags = Tag::whereIn('id', $tagConnects->get())->get();
        foreach ($tags as $tag) {
            $tag->count_news = $tag->count_news - 1;
            $tag->save();
        }
        parent::delete();
        foreach($photos as $ph) {
            $ph->delete();
        }
        $photo->delete();
        $tagConnects->delete();
    }


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


    /**
     * @return mixed
     */
    public static function getModerated()
    {
        return self::where('moderated', true)->get();
    }

    /**
     * @return array
     */
    public function getTags()
    {
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
