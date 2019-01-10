<?php

namespace App\tashkent;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $connection = 'tashkent';

    public $table = 'news';

    public $fillable = [
        'title',
        'content'
    ];
}
