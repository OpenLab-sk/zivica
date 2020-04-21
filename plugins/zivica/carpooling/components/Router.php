<?php namespace Zivica\Carpooling\Components;

use Cms\Classes\ComponentBase;

class Router extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Router Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function getPreviousPage() {
        $url        = $this->page->url;
        $eventId    = $this->page->param('event_id');
        $driverId   = $this->page->param('driver_id');

        $router = [
            '/bliziace-sa-skolenia' => url('/'),
            '/bliziace-sa-skolenia/sposob-dopravy/:event_id?' => "/bliziace-sa-skolenia",
            '/skolenie/:event_id?' => '/bliziace-sa-skolenia/sposob-dopravy/' . $eventId,
            '/skolenie/:event_id/vytvorit-ponuku' => '/bliziace-sa-skolenia/sposob-dopravy/' . $eventId,
            '/skolenie/:event_id/kontaktovat-vodica/:driver_id?' => '/skolenie/' . $eventId

        ];

        if (isset($router[$url]))
            return url('/') . $router[$url];

        return '/404';
    }
}
