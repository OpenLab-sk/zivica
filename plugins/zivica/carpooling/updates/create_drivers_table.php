<?php namespace Zivica\Carpooling\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateDriversTable extends Migration
{
    public function up()
    {
        Schema::create('zivica_carpooling_drivers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('event_id');
            $table->string('name');
            $table->string('email');
            $table->string('leaves_from');
            $table->time('leaves_at');
            $table->enum('cities', []);
            $table->integer('seats');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zivica_carpooling_drivers');
    }
}
