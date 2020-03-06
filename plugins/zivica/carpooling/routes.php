<?php
    use Zivica\Carpooling\Models\Event;
    use Zivica\Carpooling\Models\Driver;
    use Zivica\Carpooling\Models\Passenger;

    Route::post('/api/add-driver', function () {
        $driverData = \Input::all();

        $driver = new Driver;
        // $driver->event_id = nejakym sposobom ziskat eventID na frontende;
        $driver->starts_at = $driverData['starts_at'];
        $driver->name = $driverData['name'];
        $driver->email = $driverData['email'];
        $driver->leaves_from = $driverData['leaves_from'];
        $driver->leaves_at = $driverData['leaves_at'];
        $driver->cities = $driverData['cities'];
        $driver->seats = $driverData['seats'];

        $driver->save();
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
