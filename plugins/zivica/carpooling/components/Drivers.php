<?php namespace Zivica\Carpooling\Components;

use Cms\Classes\ComponentBase;
use Zivica\Carpooling\Models\Driver;
use Zivica\Carpooling\Models\Event;

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
        $drivers    = $event->drivers->reverse();

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
}
