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
    });

    Route::post('/api/update-driver', function() {
        // Marek dorobit
    });

    Route::post('/api/add-passenger', function () {
        $passengerData = \Input::all();

        $passenger = new Passenger;
        $passenger->driver_id   = $passengerData['driver_id'];
        $passenger->email       = $passengerData['email'];
        $passenger->phone       = $passengerData['phone'];
        $passenger->city        = $passengerData['city'];
        $passenger->note        = $passengerData['note'];

        $passenger->save();
    });

    Route::patch('/api/update-driver/{uuid}', function ($uuid) {

        $data = \Input::all();

        $driver = Driver::where('uuid', $uuid)->first();
        $driver->event_id = $data['event_id'];
        $driver->name = $data['name'];
        $driver->email = $data['email'];
        $driver->leaves_from = $data['leaves_from'];
        $driver->leaves_at = $data['leaves_at'];
        $driver->cities = $data['cities'];
        $driver->seats = $data['seats'];

        $driver->save();
    });

    Route::delete('/api/delete-driver/{uuid}', function ($uuid) {

        $driver = Driver::where('uuid', $uuid)->first();
        $driver->delete();
    });

    Route::get('/api/nvm', function () {

        return "true";
    });

    Route::post('/api/set-solved/passenger/{passengerId}/driver/{driverId}', function ($passengerId, $driverId) {

        $passenger = Passenger::where('id', $passengerId)->first();
        $driver = Driver::where('id', $driverId)->first();

        $passenger->isSolved = true;
        $driver->seats -= 1;

        $passenger->save();
        $driver->save();
    });

?>
