<?php

namespace App\en;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * @package App
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $title
 * @property string $content
 * @property string $date
 * @property string $finish_date
 * @property boolean $main
 * @property string $location
 */
class Event extends Model
{

    public $connection = 'mysql_en';

    /**
     * @var string
     */
    protected $table = 'events';


    /**
     * @var array
     */
    public $fillable = [
        'id',
        'title',
        'content',
        'date',
        'main',
        'location',
        'main_photo_id',
        'date',
        'finish_date'
    ];

    /**
     * @return bool
     */
    public function delete()
    {
        $photos = $this->getPhotos();
        try {
            parent::delete();
        } catch (\Exception $exception) {
            return false;
        }
        foreach($photos as $ph) {
            try {
                $ph->delete();
            } catch (\Exception $exception) {
                return false;
            }
        }
        return true;
    }

    /**
     * Return all Photo model through PhotoConnects.
     *
     * @return Photo[]
     */
    public function getPhotos()
    {
        return Photo::getAllPhotosForEvent($this->id);
    }

    /**
     * @param $limit
     * @param $offset
     * @return Event[]
     */
    public static function getModerated($limit=12, $offset=0)
    {
        return self::where('main', true)->orderBy('date', 'asc')->limit($limit)->skip($offset)->get();
    }

    /**
     * @return array
     */
    public static function getAllLocations()
    {
        $events = self::all();
        $resultArray[] = 'Выберите город';
        foreach ($events as $event) {
            if (!in_array($event->location, $resultArray)) {
                $resultArray[] = $event->location;
            }
        }
        return $resultArray;
    }


    /**
     * @param $location
     * @return mixed
     */
    public static function getEventsForLocation($location)
    {
        return $location == 'Выберите город' ? self::all() : self::where('location', $location)->where('main', true)->get();
    }

    /**
     * @return Photo
     */
    public static function getMainFilePhotoModel()
    {
        return Photo::where('type', PhotoConnect::MAIN_PHOTO_EVENTS)->first();
    }


    /**
     * @return string
     */
    public function getDatesAsString()
    {
        if ($this->finish_date === null || $this->finish_date === $this->date) {
            if ($this->date === null) {
                return null;
            }
            return date('d', strtotime($this->date)) . ' ' .
                News::nameMonth[date('n', strtotime($this->date))] . ' ' .
                date('Y', strtotime($this->date));
        }
        $startDate = \DateTime::createFromFormat('Y-m-d', $this->date);
        $finishDate = \DateTime::createFromFormat('Y-m-d', $this->finish_date);
        $isSameMonth = $startDate->format('m') === $finishDate->format('m');
        $isSameYear = $startDate->format('Y') === $finishDate->format('Y');

        return $isSameMonth ?
            $startDate->format('d') . '-' .
            $finishDate->format('d') . ' ' .
            News::nameMonth[$finishDate->format('n')] . ' ' .
            $finishDate->format('Y') :

            $startDate->format('d') . ' ' .
            News::nameMonth[$startDate->format('n')] . ' ' .
            (!$isSameYear ? $startDate->format('Y') : '') . ' - ' .
                $finishDate->format('d') . ' ' .
                News::nameMonth[$finishDate->format('n')] . ' ' .
                $finishDate->format('Y')
            ;
    }
}
