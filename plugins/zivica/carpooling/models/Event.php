<?php namespace Zivica\Carpooling\Models;

use Model;
use Ramsey\Uuid\Uuid;

/**
 * Event Model
 */
class Event extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'zivica_carpooling_events';
    public $rules = [];



    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $hasOne = [];
    public $hasMany = [
        'drivers' => [
            'Zivica\Carpooling\Models\Driver'
        ]
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
