<?php
    use Zivica\Carpooling\Models\Event;
    use Zivica\Carpooling\Models\Driver;
    use Zivica\Carpooling\Models\Passenger;

    Route::post('/api/add-driver', function () {

        $data = \Input::all();

        $driver = new Driver;
        $driver->event_id = $data['event_id'];
        $driver->name = $data['name'];
        $driver->email = $data['email'];
        $driver->leaves_from = $data['leaves_from'];
        $driver->leaves_at = $data['leaves_at'];
        $driver->cities = $data['cities'];
        $driver->seats = $data['seats'];

        $driver->save();

        return true;
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
