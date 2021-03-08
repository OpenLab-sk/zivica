<?php namespace Zivica\Carpooling\Models;

use Model;
use Carbon\Carbon;
use Zivica\Carpooling\Models\Driver;
use Zivica\Carpooling\Classes\SendMail;

class Passenger extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'zivica_carpooling_passengers';
    public $rules = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function afterCreate() {
        $driver = Driver::where('id', $this->driver_id)->first();

        SendMail::passengerSignedDriver($this, $driver);
        SendMail::passengerSignedPassenger($this);
    }

    function getDriverIdOptions() {
        $drivers = Driver::all();

        foreach ($drivers as $driver) {
            $dropdownValues[$driver->id] = $driver->name . ' - ' . $driver->email;
        }

        return $dropdownValues;
    }

    public $belongsTo = [
        'driver' => 'Zivica\Carpooling\Models\Driver'
    ];

}
