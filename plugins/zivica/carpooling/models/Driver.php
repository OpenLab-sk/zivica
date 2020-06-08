<?php namespace Zivica\Carpooling\Models;

use Model;
use Ramsey\Uuid\Uuid;
use Zivica\Carpooling\Classes\SendMail;
use Carbon\Carbon;
use Queue;
use URL;

class Driver extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'zivica_carpooling_drivers';
    public $rules = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    function getEventIdOptions() {
        $events = Event::all();

        foreach ($events as $event) {
            $dropdownValues[$event->id] = $event->name . ' - ' . $event->starts_at;
        }

        return $dropdownValues;
    }

    public function beforeCreate()
    {
        $this->uuid = Uuid::uuid4()->toString();
    }

    public function afterCreate()
    {
        SendMail::driverOfferCreated($this);

        //change minutes to days (5)
        // $later = Carbon::now()->addMinutes(1);
        // $later->tz = 'Europe/Bratislava';

        // Queue::later($later, 'Zivica\Carpooling\Classes\SendMail@sendReminderToDriver', ['driver' => $this]);
    }

    public function afterDelete()
    {
        SendMail::driverOfferDeleted($this);
    }

    public $hasMany = [
        'passengers' => [
            'Zivica\Carpooling\Models\Passenger',
            'key'       => 'driver_id',
            'otherKey'  => 'id'
        ]
    ];

    public $belongsTo = [
        'event' => [
            'Zivica\Carpooling\Models\Event',
            'key' => 'event_id'
        ]
    ];
}
