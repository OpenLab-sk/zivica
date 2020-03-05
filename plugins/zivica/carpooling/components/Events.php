<?php namespace Zivica\Carpooling\Components;

use Cms\Classes\ComponentBase;
use Zivica\Carpooling\Models\Event;

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
    public function defineProperties()
    {
        return [];
    }
}
