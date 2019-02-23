<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Partner
 * @package App
 * @property int $id
 * @property string $link
 * @property string $title
 * @property int $priority
 * @property int $photo_id
 * @property integer $type
 * @property string $created_at
 * @property string $updated_at
 * @property Photo $photo
 *
 */
class Partner extends Model
{

    const ORGANIZATORS = 0;
    const GENERAL_SPONSORS = 1;
    const SPONSORS = 2;
    const INFORM_PARTNERS = 3;

    const TYPE_COMPANY = 0;
    const TYPE_INDIVIDUAL = 1;


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

    public static function getInPriority($type=0)
    {
        return self::where('type', $type)->all()->sortBy('priority');
    }
}
