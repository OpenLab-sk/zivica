<?php namespace Zivica\Carpooling\Components;

use Cms\Classes\ComponentBase;
use Zivica\Carpooling\Models\Event;
use Zivica\Carpooling\Models\Driver;
use Carbon\Carbon;
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

    function getEventId() {
        return $this->page->param('event_id');
    }

    function getAllEvents()
    {
        // $twoDaysAgo = Carbon::now()->subDays(2);
        // $twoDaysAgo->tz = 'Europe/Bratislava';

        // $events = Event::all()->where('starts_at', '>', $twoDaysAgo)->sortBy('starts_at');
        $events = Event::all()->sortBy('starts_at')->reverse();

        foreach ($events as $key => $event) {
            $events[$key] = self::_enrich_Date_Time_Drivers($event);
        }

        return $events;
    }

    function getEvent()
    {
        $eventId                        = $this->page->param('event_id');
        $event                          = Event::where('id', $eventId)->first();

        if ($event == null) {
            header('Location: '. env('APP_URL') . '/404');
            die();

            // Use this, but its not working -_-
            // return \Response::make('Page not found', 404);
        }

        $event                          = self::_enrich_Date_Time_Drivers($event);
        $event->attributes['drivers']   = $event->drivers;

        return $event;
    }

    static function _enrich_Date_Time_Drivers($event) {
        $strtotime                      = strtotime($event->starts_at);

        $event['date']                  = date("d.m.Y", $strtotime);
        $event['time']                  = date("H:i", $strtotime);
        $event['number_of_drivers']     = count($event->drivers);

        return $event;
    }
}
