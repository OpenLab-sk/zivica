<?php namespace Zivica\Carpooling\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Events Back-end Controller
 */
class Events extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        $this->addCss('/plugins/zivica/carpooling/controllers/assets/css/style.css');
        BackendMenu::setContext('Zivica.Carpooling', 'carpooling', 'events');
    }
}
