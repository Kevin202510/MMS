<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateTemperatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temperatures', function (Blueprint $table) {
            $table->id();
            $table->double("temperature", 15, 8);
            $table->integer("status")->default(0);
            $table->softDeletes();
            $table->timestamp('created_at')->default(Carbon::now(new Date()));
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temperatures');
    }
}
