<?php namespace Zivica\Carpooling\Components;

use Cms\Classes\ComponentBase;
use Zivica\Carpooling\Models\Driver;

class DriverDetails extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'DriverDetails Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    function getDriversUuid() {
        return $this->page->param('driver_uuid');
    }

    function getDriver() {
        $uuid       = $this->page->param('driver_uuid');
        $driver     = Driver::all()->where('uuid', $uuid)->first();

        return $driver;
    }

    function getDriverId() {
        return $this->page->param('driver_id');
    }
}
