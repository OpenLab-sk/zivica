<?php namespace Zivica\Carpooling;

use Backend;
use System\Classes\PluginBase;

/**
 * Carpooling Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Carpooling',
            'description' => 'No description provided yet...',
            'author'      => 'Zivica',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Zivica\Carpooling\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'zivica.carpooling.some_permission' => [
                'tab' => 'Carpooling',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'carpooling' => [
                'label'       => 'Carpooling',
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
