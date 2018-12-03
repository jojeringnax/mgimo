<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * @var string
     */
    protected $table = 'photos';

    const NEWS = 1;
    const BOOK = 2;
    const CONGRATULATION = 3;
}
