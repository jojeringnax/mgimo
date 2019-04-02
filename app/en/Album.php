<?php

namespace App\en;

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
    public $connection = 'mysql_en';

    /**
     * @var string
     */
    public $table = 'albums';

    /**
     * @var array
     */
    public $fillable = [
        'id',
        'name'
    ];


    /**
     * @return bool|null
     * @throws \Exception
     */
    public function delete()
    {
        foreach ($this->photos as $photo) {
            try {
                $photo->delete();
            } catch (\Exception $exception) {
                continue;
            }
        }
        try {
            return parent::delete();
        } catch (\Exception $exception) {
            return 'Not deleted';
        }
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

    /**
     * @return Photo|null
     */
    public function lastPhoto()
    {
        return Photo::where('album_id', $this->id)->orderBy('id', 'asc')->first();
    }

    /**
     * Return tags as array.
     *
     * @return array
     */
    public function getTags()
    {
        $resultArray = [];
        $tagConnects = TagConnect::photo($this->id);
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
