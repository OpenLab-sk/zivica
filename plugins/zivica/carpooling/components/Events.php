<?php namespace Zivica\Carpooling\Components;

use Cms\Classes\ComponentBase;
use Zivica\Carpooling\Models\Event;
use Zivica\Carpooling\Models\Driver;
use Redirect;

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

        if ($event == null) {
            header('Location: '. env('APP_URL') . '/404');
            die();

            // Use this, but its not working -_-
            // return \Response::make('Page not found', 404);
        }

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
