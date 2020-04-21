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

        if ($url == '/')
            return 'https://centrumzajezova.sk/';

        $router = [
            '/bliziace-sa-skolenia'                                 => '',
            '/bliziace-sa-skolenia/sposob-dopravy/:event_id?'       => "/bliziace-sa-skolenia",
            '/skolenie/:event_id?'                                  => '/bliziace-sa-skolenia/sposob-dopravy/' . $eventId,
            '/skolenie/:event_id/vytvorit-ponuku'                   => '/bliziace-sa-skolenia/sposob-dopravy/' . $eventId,
            '/skolenie/:event_id/kontaktovat-vodica/:driver_id?'    => '/skolenie/' . $eventId,
            '/hotovo'    => '',
            '/ponuka-pridana'    => ''
        ];

        if (isset($router[$url]))
            return url('/') . $router[$url];

        return '/404';
    }
}
