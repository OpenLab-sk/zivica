<?php namespace Zivica\Carpooling\Models;

use Model;
use Ramsey\Uuid\Uuid;

class Event extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'zivica_carpooling_events';
    public $rules = [];

<<<<<<< HEAD


=======
>>>>>>> 8175979bdaf48fffc9ea8591b9d63f860ff8d5b8
    protected $dates = [
        'created_at',
        'updated_at'
    ];

<<<<<<< HEAD
    public $hasOne = [];
=======
>>>>>>> 8175979bdaf48fffc9ea8591b9d63f860ff8d5b8
    public $hasMany = [
        'drivers' => [
            'Zivica\Carpooling\Models\Driver'
        ]
    ];
}
