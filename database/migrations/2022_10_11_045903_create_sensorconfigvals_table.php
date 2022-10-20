<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorconfigvalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensorconfigvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensorconfigurations_id');
            $table->string("sensors_configuration_value")->comment("Values For Sensors");
            $table->timestamps();

            $table->foreign('sensorconfigurations_id')->references('id')->on('sensorsconfigurations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensorconfigvals');
    }
}
