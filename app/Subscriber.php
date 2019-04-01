<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Subscriber extends Model
{
    protected $table = 'subscribers';

    /**
     * @var array
     */
    public $fillable = [
        'id',
        'name',
        'email',
        'course',
        'faculty',
        'work',
        'post',
        'aactive'
    ];

    /**
     * @return self[]
     */
    public function getActives()
    {
        return self::where('active', true)->get();
    }
}
