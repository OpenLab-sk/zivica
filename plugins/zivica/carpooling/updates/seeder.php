<?php namespace Zivica\Carpooling\Updates;

use Seeder;
use Zivica\Carpooling\Models\Driver;
use Zivica\Carpooling\Models\Event;
use Zivica\Carpooling\Models\Passenger;

class SeedWebsitesTable extends Seeder
{
    public function run()
    {
        Event::create([
            'name'       =>  'Skola hrou',
            'starts_at'  => '2020-03-03 00:00:00',
            'ends_at'    => '2020-03-03 00:00:00'
        ]);
        Event::create([
            'name'       =>  'Skola nehrou',
            'starts_at'  => '2020-03-03 00:00:00',
            'ends_at'    => '2020-03-03 00:00:00'
        ]);
        Driver::create([
            'event_id'  =>  '1',
            'name'      =>  'Marek',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Galanta',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);
        Driver::create([
            'event_id'  =>  '1',
            'name'      =>  'Matej',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Velky Biel',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);
        Driver::create([
            'event_id'  =>  '2',
            'name'      =>  'Jozo',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Galanta',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);
        Driver::create([
            'event_id'  =>  '2',
            'name'      =>  'Fero',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Velky Biel',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);

        Event::create([
            'name'       =>  'Skola hrou',
            'starts_at'  => '2020-03-03 00:00:00',
            'ends_at'    => '2020-03-03 00:00:00'
        ]);
        Event::create([
            'name'       =>  'Skola nehrou',
            'starts_at'  => '2020-03-03 00:00:00',
            'ends_at'    => '2020-03-03 00:00:00'
        ]);
        Driver::create([
            'event_id'  =>  '1',
            'name'      =>  'Marek',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Galanta',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);
        Driver::create([
            'event_id'  =>  '1',
            'name'      =>  'Matej',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Velky Biel',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);
        Driver::create([
            'event_id'  =>  '2',
            'name'      =>  'Jozo',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Galanta',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);
        Driver::create([
            'event_id'  =>  '2',
            'name'      =>  'Fero',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Velky Biel',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);

        Event::create([
            'name'       =>  'Skola hrou',
            'starts_at'  => '2020-03-03 00:00:00',
            'ends_at'    => '2020-03-03 00:00:00'
        ]);
        Event::create([
            'name'       =>  'Skola nehrou',
            'starts_at'  => '2020-03-03 00:00:00',
            'ends_at'    => '2020-03-03 00:00:00'
        ]);
        Driver::create([
            'event_id'  =>  '1',
            'name'      =>  'Marek',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Galanta',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);
        Driver::create([
            'event_id'  =>  '1',
            'name'      =>  'Matej',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Velky Biel',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);
        Driver::create([
            'event_id'  =>  '2',
            'name'      =>  'Jozo',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Galanta',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);
        Driver::create([
            'event_id'  =>  '2',
            'name'      =>  'Fero',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Velky Biel',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);

        Event::create([
            'name'       =>  'Skola hrou',
            'starts_at'  => '2020-03-03 00:00:00',
            'ends_at'    => '2020-03-03 00:00:00'
        ]);
        Event::create([
            'name'       =>  'Skola nehrou',
            'starts_at'  => '2020-03-03 00:00:00',
            'ends_at'    => '2020-03-03 00:00:00'
        ]);
        Driver::create([
            'event_id'  =>  '1',
            'name'      =>  'Marek',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Galanta',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);
        Driver::create([
            'event_id'  =>  '1',
            'name'      =>  'Matej',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Velky Biel',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);
        Driver::create([
            'event_id'  =>  '2',
            'name'      =>  'Jozo',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Galanta',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);
        Driver::create([
            'event_id'  =>  '2',
            'name'      =>  'Fero',
            'email'     =>  'email@email.com',
            'leaves_from'   =>  'Velky Biel',
            'leaves_at'     =>  '2020-03-03 00:00:00',
            'cities'        =>  'Bratislava, Senec, Trnava',
            'seats'         =>  '3'
        ]);
    }
}
