<?php

namespace App\tashkent;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $connection = 'tashkent';

    public $table = 'events';

    public $fillable = [
        'date',
        'time_from',
        'time_to',
        'pre_title',
        'title',
        'all_day'
    ];

    /**
     * @param $date
     */
    public static function getForDate($date)
    {
        return self::where('date', $date)->get();
    }

    public static function getAsArrayWithDates()
    {
        $models = self::orderBy('date')->orderBy('time_to')->get();
        $resultArray = [];
        foreach ($models as $model) {
            $resultArray[$model->date][] = $model;
        }
        return $resultArray;
    }


}
