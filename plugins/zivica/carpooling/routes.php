<?php
    use Zivica\Carpooling\Models\Event;
    use Zivica\Carpooling\Models\Driver;
    use Zivica\Carpooling\Models\Passenger;

    Route::post('/api/add-driver', function () {
        $data   = \Input::all();
        $driver = new Driver;

        $driver->event_id       = $data['event_id'];
        $driver->name           = $data['name'];
        $driver->email          = $data['email'];
        $driver->leaves_from    = $data['leaves_from'];
        $driver->leaves_at      = $data['leaves_at'];
        $driver->cities         = $data['cities'];
        $driver->seats          = $data['seats'];

        $driver->save();
        return ['uuid' => $driver->uuid];
    });

    Route::post('/api/add-passenger', function () {
        $passengerData  = \Input::all();
        $passenger      = new Passenger;

        $passenger->name        = $passengerData['name'];
        $passenger->driver_id   = $passengerData['driver_id'];
        $passenger->email       = $passengerData['email'];
        $passenger->phone       = $passengerData['phone'];
        $passenger->city        = $passengerData['city'];
        $passenger->note        = $passengerData['note'];

        $passenger->save();
    });

    Route::patch('/api/update-driver/{uuid}', function ($uuid) {
        $data   = \Input::all();
        $driver = Driver::where('uuid', $uuid)->first();

        $driver->event_id       = $data['event_id'];
        $driver->name           = $data['name'];
        $driver->email          = $data['email'];
        $driver->leaves_from    = $data['leaves_from'];
        $driver->leaves_at      = $data['leaves_at'];
        $driver->cities         = $data['cities'];
        $driver->seats          = $data['seats'];

        $driver->save();
    });

    Route::delete('/api/delete-driver/{uuid}', function ($uuid) {
        $driver = Driver::where('uuid', $uuid)->first();
        $driver->delete();
    });
?>
