<?php namespace Zivica\CarPooling\Classes;

use Carbon\Carbon;
use Mail;

class SendMail
{
    static function driverOfferCreated($driver) {

        Mail::send('zivica.carpooling::mail.driver.offer', [

            'driver' => $driver

        ], function($message) use($driver) {
        $message->to($driver->email, $driver->name);
        });
    }

    static function passengerSignedDriver($passenger, $driver) {

        $driverEmail    = $driver->email;
        $driverName     = $driver->name;

        Mail::send('zivica.carpooling::mail.add-passenger.driver', [

            'passenger' => $passenger,
            'driver'    => $driver

        ], function($message) use ($driverEmail, $driverName) {
            $message->to($driverEmail, $driverName);
        });
    }

    static function passengerSignedPassenger($passenger) {

        Mail::send('zivica.carpooling::mail.add-passenger.passenger', [

            'passenger' => $passenger

        ], function($message) use($passenger) {
            $message->to($passenger->email);
        });
    }

    static function sendReminderToDriver($job, $data) {

        $driver = (object)$data['driver'];

        Mail::send('zivica.carpooling::mail.driver.reminder', [

            'driver' => $driver,
            'url'    => $data['url']

        ], function($message) use($driver) {
            $message->to($driver->email);
        });

        $job->delete();
    }
}
