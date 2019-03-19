<?php

namespace App\en;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Congratulation
 * @package App
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $date
 * @property int $main_photo_id
 * @property Photo $mainPhoto
 * @property int $priority
 * @property bool $moderated
 *
 */
class Congratulation extends Model
{

    /**
     * @var string 
     */
    public $connection = 'mysql_en';

    /**
     * @var string
     */
    public $table = 'congratulations';


    /**
     * @var bool
     */
    public $timestamps = false;


    /**
     * @var array
     */
    public $fillable = ['main_photo_id'];

    /**
     * Delete main photo for evade a relative exception.
     * Delete the model from database.
     *
     * @return bool|null
     */
    public function delete()
    {
        $photo = $this->mainPhoto;
        $this->update(['main_photo_id' => null]);
        if ($photo !== null) {
            $photo->delete();
        }
        return parent::delete();
    }


    /**
     * Return Photo-model of the main photo of the Congratulation.
     *
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
        $resultArray[0] = 'Выберите дату';
        $resultArray['19411950'] = '1941 - 1950';
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

    /**
     * @return mixed
     */
    public static function getModerated($limit=4,$offset=0)
    {
        return self::where('moderated', true)->orderBy('priority', 'asc')->limit($limit)->skip($offset)->get();
    }

    /**
     * Return all Photo model through PhotoConnects.
     *
     * @return Photo[]
     */
    public function getPhotos()
    {
        return Photo::getAllPhotosForCongratulation($this->id);
    }
}
