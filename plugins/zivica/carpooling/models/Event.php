<?php namespace Zivica\Carpooling\Models;

use Model;
use Ramsey\Uuid\Uuid;

class Event extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'zivica_carpooling_events';
    public $rules = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $hasMany = [
        'drivers' => [
            'Zivica\Carpooling\Models\Driver'
        ]
    ];
}
