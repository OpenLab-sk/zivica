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

    function getEventIdOptions() {
        $events        = Event::all();

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
        Mail::send('zivica.carpooling::mail.driver.offer', [
            'driver' => $this
        ], function($message) {
           $message->to($this->email, $this->name);
        });
    }

    public $hasMany = [
        'passengers' => [
            'Zivica\Carpooling\Models\Passenger',
            'key'    => 'driver_id',
            //kuknut sa na toto ci to treba
            'otherKey' => 'id'
        ]
    ];

    public $belongsTo = [
        // 'event' => 'Zivica\Carpooling\Models\Event'
        'event' => [
            'Zivica\Carpooling\Models\Event',
            //aj toto
            'key' => 'event_id'
        ]
    ];
}
