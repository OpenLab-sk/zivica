<?php namespace Zivica\Carpooling\Components;

use Cms\Classes\ComponentBase;
use Zivica\Carpooling\Models\Event;
use Zivica\Carpooling\Models\Driver;

class Events extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Events Component',
            'description' => 'No description provided yet...'
        ];
    }

    function getAllEvents()
    {
        return Event::all();
    }

    function getEvent($eventID = 1)
    {
        $event = Event::where('id', $eventID)->first();
        $event->attributes['drivers'] = $event->drivers;
        return $event;
    }

    public function defineProperties()
    {
        return [];
    }
}
