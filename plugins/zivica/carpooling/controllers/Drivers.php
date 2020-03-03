<?php namespace Zivica\Carpooling\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Drivers Back-end Controller
 */
class Drivers extends Controller
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

        BackendMenu::setContext('Zivica.Carpooling', 'carpooling', 'drivers');
    }
}
