<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Smi
 * @package App
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $link
 * @property string $link_view
 * @property string $title
 *
 */
class Smi extends Model
{
    /**
     * @var string
     */
    protected $table = 'smis';

    /**
     * @var array
     */
    public $fillable = [
        'id',
        'link',
        'link_view',
        'title',
        'date'
    ];

}
