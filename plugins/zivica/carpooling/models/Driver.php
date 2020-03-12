<?php namespace Zivica\Carpooling\Models;

use Model;
use Mail;
use Ramsey\Uuid\Uuid;

class Driver extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'zivica_carpooling_drivers';
    public $rules = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

<<<<<<< HEAD
    function getEventIdOptions() {
        $events        = Event::all();
        $dropdownValues = [null => ''];

        foreach ($events as $event) {
            $dropdownValues[$event->id] = $event->name . ' - ' . $event->starts_at;
        }

        return $dropdownValues;
    }

    public $hasOne = [];
=======
    public function beforeCreate()
    {
        $this->uuid = Uuid::uuid4()->toString();
    }

>>>>>>> 8175979bdaf48fffc9ea8591b9d63f860ff8d5b8
    public $hasMany = [
        'passengers' => [
            'Zivica\Carpooling\Models\Passenger',
            'key'    => 'driver_id',
            'otherKey' => 'id'
        ]
    ];

    public $belongsTo = [
        'event' => [
            'Zivica\Carpooling\Models\Event',
            'key' => 'event_id'
        ]
    ];
}
