<?php namespace Zivica\Carpooling\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('zivica_carpooling_events', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zivica_carpooling_events');
    }
}
