<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';


    public function tagConnects()
    {
        return $this->hasMany(TagConnect::class, 'id', 'id');
    }
}
