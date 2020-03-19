<?php namespace Zivica\Carpooling\Models;

use Model;
use Mail;
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

    public function afterCreate() {
        $driver = Driver::where('id', $this->driver_id)->first();
        $driverEmail = $driver->email;
        $driverName = $driver->name;
        Mail::send('zivica.carpooling::mail.add-passenger.driver', [
            'passenger' => $this
        ], function($message) use ($driverEmail, $driverName) {
            $message->to($driverEmail, $driverName);
        });

        Mail::send('zivica.carpooling::mail.add-passenger.passenger', [
            'passenger' => $this
        ], function($message) {
            $message->to($this->email);
        });
    }

    function getDriverIdOptions() {
        $drivers        = Driver::all();

        foreach ($drivers as $driver) {
            $dropdownValues[$driver->id] = $driver->name . ' - ' . $driver->email;
        }

        return $dropdownValues;
    }

    public $belongsTo = [
        'driver' => 'Zivica\Carpooling\Models\Driver'
    ];

}
