<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    /**
     * @var string
     */
    protected $table = 'photos';

    public $timestamps = false;

    public $fillable = [
      'album_id'
    ];

    /**
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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function photoConnect()
    {
        return $this->hasOne(PhotoConnect::class, 'id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function album()
    {
        return $this->hasOne(Album::class, 'id','album_id');
    }

    /**
     * @param $articleId
     * @return mixed
     */
    public static function getAllPhotosForArticle($articleId)
    {
        $photoConnects = PhotoConnect::article($articleId)->toArray();
        return self::whereIn('id', $photoConnects)->get();
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
