<?php

namespace App\en;

use Illuminate\Database\Eloquent\Model;


/**
 * Class PhotoConnect
 * @package App
 *
 * @property int $id
 * @property int $connect_id
 * @property int $type
 */
class PhotoConnect extends Model
{

    public $connection = 'mysql_en';

    /**
     * @var string
     */
    protected $table = 'photo_connects';

    /**
     * @var bool
     */
    public $timestamps = false;

    const NEWS = 1;
    const BOOK = 2;
    const CONGRATULATION = 3;
    const GALLERY = 4;
    const EVENT = 5;

    const MAIN_PHOTO_EVENTS = 6;

    /**
     * Return Photo of this Model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function photo()
    {
        return $this->hasOne(Photo::class, 'id', 'id');
    }
}
