<?php

namespace App\en;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{

    /**
     * @var string
     */
    public $connection = 'mysql_en';

    /**
     * @var string
     */
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
        'active'
    ];

    /**
     * @return self[]
     */
    public function getActives()
    {
        return self::where('active', true)->get();
    }
}
