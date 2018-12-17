<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Partner
 * @package App
 * @property int $id
 * @property string $link
 * @property string $name
 * @property int $priority
 * @property int $photo_id
 * @property string $created_at
 * @property string $updated_at
 * @property Photo $photo
 *
 */
class Partner extends Model
{
    /**
     * @var string
     */
    public $table = 'partners';

    /**
     * @var array
     */
    public $fillable = [
      'photo_id'
    ];

    public function photo()
    {
        return $this->hasOne(Photo::class, 'id','photo_id');
    }

    public static function getInPriority()
    {
        return self::all()->sortBy('priority');
    }
}
