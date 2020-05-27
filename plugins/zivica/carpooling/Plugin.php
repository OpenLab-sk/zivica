<?php namespace Zivica\Carpooling;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'Carpooling',
            'description' => 'No description provided yet...',
            'author'      => 'Zivica',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerMailLayouts()
    {
        return [
            'spolujazda'  => 'zivica.carpooling::mail.layout-spolujazda'
        ];
    }

    public function registerMailTemplates()
    {
        return [
            'zivica.carpooling::mail.driver.offer-created',
            'zivica.carpooling::mail.driver.offer-deleted',
            'zivica.carpooling::mail.add-passenger.driver',
            'zivica.carpooling::mail.add-passenger.passenger',
            'zivica.carpooling::mail.driver.reminder'
        ];
    }

    public function registerComponents()
    {
        return [
            'Zivica\Carpooling\Components\Events'       => 'events',
            'Zivica\Carpooling\Components\Drivers'      => 'drivers',
            'Zivica\Carpooling\Components\Router'       => 'router',
        ];
    }

    public function registerNavigation()
    {
        return [
            'carpooling' => [
                'label'       => 'Spolujazda',
                'url'         => Backend::url('zivica/carpooling/events'),
                'icon'        => 'icon-car',
                'permissions' => ['zivica.carpooling.*'],
                'order'       => 500,
                'sideMenu'  => [
                    'events' => [
                        'label' => 'Events',
                        'icon'  => 'icon-calendar',
                        'url'   => Backend::url('zivica/carpooling/events')
                    ],
                    'drivers' => [
                        'label' => 'Drivers',
                        'icon'  => 'icon-wheelchair-alt',
                        'url'   => Backend::url('zivica/carpooling/drivers')
                    ],
                    'passengers' => [
                        'label' => 'Passengers',
                        'icon'  => 'icon-wheelchair',
                        'url'   => Backend::url('zivica/carpooling/passengers')
                    ]
                ]
            ],
        ];
    }
}
