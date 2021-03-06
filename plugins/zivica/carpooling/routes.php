<?php
    use Zivica\Carpooling\Models\Event;
    use Zivica\Carpooling\Models\Driver;
    use Zivica\Carpooling\Models\Passenger;
    use Zivica\Carpooling\Classes\SendMail;

    Route::post('/api/add-driver', function () {
        $driverData   = \Input::all();
        $validation = Validator::make($driverData, [
            'event_id'      =>  'required|numeric',
            'name'          =>  'required|string',
            'email'         =>  'required|e-mail',
            'leaves_from'   =>  'required|string',
            'leaves_at'     =>  'required|date_format:H:i',
            'cities'        =>  'required|string',
            'seats'         =>  'required|numeric|between:1,10'
        ]);

        if($validation->passes()) {
            $driver = new Driver;

            $driver->event_id       = $driverData['event_id'];
            $driver->name           = $driverData['name'];
            $driver->email          = $driverData['email'];
            $driver->leaves_from    = $driverData['leaves_from'];
            $driver->leaves_at      = $driverData['leaves_at'];
            $driver->cities         = $driverData['cities'];
            $driver->seats          = $driverData['seats'];

            $driver->save();

            return ['uuid' => $driver->uuid];
        } else if ($validation->fails()) {
            $messages = JSON_decode($validation->messages());
            if (isset($messages->leaves_at))
            {
                return Response::make(["Cas musi byt uvedeny v 24 hodinovom formate (napr. 02:30 alebo 16:05)"], 400);
            } else {
                return Response::make([$messages], 400);
            }
        }
    });

    Route::post('/api/add-passenger', function () {
        $passengerData  = \Input::all();

        if(Driver::where('id', $passengerData['driver_id'])->value('seats') < 1) {
            return \Response::make(['Pocet volnych miest vodica je menej ako 1'], 400);
        };

        $validation = Validator::make($passengerData, [
            'name'          =>  'required|string',
            'driver_id'     =>  'required|numeric',
            'email'         =>  'required|e-mail',
            'phone'         =>  'required|numeric',
            'city'          =>  'required|string',
            'note'          =>  'string'
        ]);

        if($validation->passes()) {
            $passenger      = new Passenger;

            $passenger->name        = $passengerData['name'];
            $passenger->driver_id   = $passengerData['driver_id'];
            $passenger->email       = $passengerData['email'];
            $passenger->phone       = $passengerData['phone'];
            $passenger->city        = $passengerData['city'];
            if(isset($passengerData['note'])) {
                $passenger->note        = $passengerData['note'];
            }

            $passenger->save();

        } else if($validation->fails()) {
            $messages = JSON_decode($validation->messages());
            return Response::make([$messages], 400);
        }
    });

    Route::patch('/api/update-driver/{uuid}', function ($uuid) {
        $data   = \Input::all();
        $validation = Validator::make($data, [
            'event_id'      =>  'required|numeric',
            'name'          =>  'required|string',
            'leaves_from'   =>  'required|string',
            'leaves_at'     =>  'required|date_format:H:i',
            'cities'        =>  'required|string',
            'seats'         =>  'required|numeric|between:1,10'
        ]);

        if($validation->passes()) {
            $driver = Driver::where('uuid', $uuid)->first();

            $driver->event_id       = $data['event_id'];
            $driver->name           = $data['name'];
            $driver->leaves_from    = $data['leaves_from'];
            $driver->leaves_at      = $data['leaves_at'];
            $driver->cities         = $data['cities'];
            $driver->seats          = $data['seats'];

            $driver->save();

        } else if($validation->fails()) {
            $messages = JSON_decode($validation->messages());
            if (isset($messages->seats))
            {
                return Response::make(["Pocet miest musi byt v rozpati 1-10"], 400);
            } else {
                return Response::make([$messages], 400);
            }
        }
    });

    Route::get('/api/delete-driver/{uuid}', function ($uuid) {
        $driver = Driver::where('uuid', $uuid)->first();
        if(!$driver) {
            return Redirect::to('ponuka-neexistuje');
        } else {
            $driver->delete();
            return Redirect::to('ponuka-vymazana');
        }
    });
?>
