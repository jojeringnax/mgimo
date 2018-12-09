<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    public $timestamps = false;
    public $fillable = ['count_news', 'count_events', 'count_photos'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany | TagConnect[]
     */
    public function tagConnects()
    {
        return $this->hasMany(TagConnect::class, 'id', 'id');
    }
}
