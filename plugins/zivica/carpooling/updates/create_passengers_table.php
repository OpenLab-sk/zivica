<?php namespace Zivica\Carpooling\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePassengersTable extends Migration
{
    public function up()
    {
        Schema::create('zivica_carpooling_passengers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zivica_carpooling_passengers');
    }
}
