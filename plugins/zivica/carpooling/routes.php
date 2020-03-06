<?php
    use Zivica\Carpooling\Models\Event;
    use Zivica\Carpooling\Models\Driver;
    use Zivica\Carpooling\Models\Passenger;

    Route::post('/api/add-driver', function () {
        $eventData = \Input::all();

        $event = new Event;
        $event->name = $eventData['name'];
        $event->starts_at = $eventData['starts_at'];
        $event->ends_at = $eventData['ends_at'];

        $event->save();
    });
    Route::post('/api/add-passenger', function () {
        $passengerData = \Input::all();

        $passenger = new Passenger;
        // $passenger->driver_id = nejakym sposobom ziskat driverID na frontende;
        $passenger->email = $passengerData['email'];
        $passenger->phone = $passengerData['phone'];
        $passenger->phone = $passengerData['city'];
        $passenger->phone = $passengerData['note'];

        $passenger->save();
    });
?>
