<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * @package App
 *
 * @property int $id
 * @property string $word
 * @property integer $count_news
 * @property integer $count_events
 * @property integer $count_photos
 *
 */
class Tag extends Model
{
    /**
     * @var string
     */
    protected $table = 'tags';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    public $fillable = ['count_news', 'count_events', 'count_photos'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany | TagConnect[]
     */
    public function tagConnects()
    {
        return $this->hasMany(TagConnect::class, 'id', 'id');
    }

    public function albums()
    {
        $tagConnects = TagConnect::where('id', $this->id)->where('type', TagConnect::GALLERY)->select('connect_id')->get()->toArray();
        return Album::whereIn('id', array_flatten($tagConnects))->get();
    }
}
