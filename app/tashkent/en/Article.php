<?php

namespace App\tashkent\en;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $connection = 'tashkent_en';

    public $table = 'news';

    public $fillable = [
        'title',
        'link'
    ];
}
