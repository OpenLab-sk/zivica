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

    public function defineProperties()
    {
        return [];
    }

    function getAllEvents()
    {
        $events = Event::all();

        foreach ($events as $key => $event) {
            $events[$key] = self::_enrichDateTime($event);
        }

       return $events;
    }

    function getEvent()
    {
        $eventId                        = $this->page->param('id');
        $event                          = Event::where('id', $eventId)->first();
        $event->attributes['drivers']   = $event->drivers;

        return $event;
    }

    static function _enrichDateTime($event) {
        $dateTime = explode(' ', $event['starts_at']);

        if (count($dateTime) !== 2) {
            $event['date'] = 'Error';
            $event['time'] = 'Error';
        }
        else {
            $event['date'] = str_replace('-', '.', $dateTime[0]);
            $event['time'] = $dateTime[1];
        }

        return $event;
    }
}
