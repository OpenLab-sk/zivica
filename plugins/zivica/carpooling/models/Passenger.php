<?php namespace Zivica\Carpooling\Models;

use Model;
use Zivica\Carpooling\Models\Driver;

class Passenger extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'zivica_carpooling_passengers';
    public $rules = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    function getDriverIdOptions() {
        $drivers        = Driver::all();
        $dropdownValues = [null => ''];

        foreach ($drivers as $driver) {
            $dropdownValues[$driver->id] = $driver->name . ' - ' . $driver->email;
        } 

        return $dropdownValues;
    }

    public $belongsTo = [
        'driver' => 'Zivica\Carpooling\Models\Driver'
    ];

}
