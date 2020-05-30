<?php namespace Zivica\Carpooling\Components;

use Cms\Classes\ComponentBase;
use Zivica\Carpooling\Models\Passenger;

class Statistics extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Statistics Component'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun() {
        $this->addCss('./components/statistics/assets/css/statistics.css');
        $this->addJs('./components/statistics/assets/js/statistics.js');
    }

    public function getSavedEmissions() {

        $passengers         = Passenger::all()->where('isSolved', '1');
        $numberOfPassengers = count($passengers);
        $averageKm          = 150;
        $averageSavingPerKm = 130;

        $totalSavingPerPassenger = $averageKm * $averageSavingPerKm;

        return self::_gramsToKilograms($totalSavingPerPassenger * $numberOfPassengers);
    }

    static function _gramsToKilograms($grams) {
        return $grams / 1000;
    }
}
