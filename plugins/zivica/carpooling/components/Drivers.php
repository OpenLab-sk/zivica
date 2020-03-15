<?php namespace Zivica\Carpooling\Components;

use Cms\Classes\ComponentBase;
use Zivica\Carpooling\Models\Driver;
use Zivica\Carpooling\Models\Event;
use Zivica\Carpooling\Models\Passenger;

class Drivers extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Driver Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    function getDrivers() {
        $eventId    = $this->page->param('event_id');
        $event      = Event::all()->where('id', $eventId)->first();
        $drivers    = $event->drivers->where('seats', '>', 0)->reverse();

        foreach ($drivers as $driver) {
            $driver->uuid = 'hidden';
        }

        return $drivers;
    }

    function getDriver() {
        $uuid       = $this->page->param('driver_uuid');
        $driver     = Driver::all()->where('uuid', $uuid)->first();

        return $driver;
    }

    function getDriversUuid() {
        return $this->page->param('driver_uuid');
    }

    function getDriverId() {
        return $this->page->param('driver_id');
    }

    // public function onSetToSolved($passengerId, $driverId) {
    //     $passenger = Passenger::where('id', $passengerId)->first();
    //     $driver = Driver::where('id', $driverId)->first();

    //     $passenger->isSolved = true;
    //     $driver->seats -= 1;

    //     $passenger->save();
    //     $driver->save();
    // }
}
