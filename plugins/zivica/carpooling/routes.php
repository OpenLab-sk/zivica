<?php
    use Zivica\Carpooling\Models\Event;

    Route::post('/api/add-driver', function () {
        $eventData = \Input::all();

        $event = new Event;
        $event->name = $eventData['name'];
        $event->starts_at = $eventData['starts_at'];
        $event->ends_at = $eventData['ends_at'];

        $event->save();
    });
?>