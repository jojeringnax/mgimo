<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Congratulation extends Model
{
    public $table = 'congratulations';

    public $timestamps = false;

    public $fillable = ['main_photo_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mainPhoto()
    {
        return $this->hasOne(Photo::class, 'id','main_photo_id');
    }

    public static function getDatesArray()
    {
        $dateFrom = \DateTime::createFromFormat('Y', '1951');
        $dateTo = new \DateTime();
        $diff = $dateFrom->diff($dateTo)->y;
        $diff = $diff/10;
        $dateTo->setDate(1961, 0,0);
        $resultArray = array(
            '19411950' => '1941 - 1950'
        );
        foreach(range(0,$diff) as $i) {
            $resultArray[$dateFrom->format('Y').$dateTo->format('Y')] = $dateFrom->format('Y').' - '.$dateTo->format('Y');
            $dateFrom->modify('+10 years');
            $dateTo->modify('+10 years');
            if ($dateTo->format('Y') > date('Y')) {
                $dateTo->setDate(date('Y')+1, 0, 0);
            }
        }
        return $resultArray;
    }
}
