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

    public function beforeCreate()
    {
        $this->uuid = Uuid::uuid4()->toString();
    }

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
