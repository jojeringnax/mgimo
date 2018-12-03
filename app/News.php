<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $attributes = [
        'main_photo_id' => null,
    ];
}
