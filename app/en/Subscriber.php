<?php

namespace App\en;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{

    public $connection = 'mysql_en';

    protected $table = 'subscribers';

    /**
     * @return self[]
     */
    public function getActives()
    {
        return self::where('active', true)->get();
    }
}
