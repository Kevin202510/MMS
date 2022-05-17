<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id')->default(2);
            $table->string('fname');
            $table->string('lname');
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->boolean('isApproved')->default(0);
            $table->string('username')->unique();
            $table->string('password')->default('$2y$10$wtu.3BT7MJ0oNDIIcYeBMusa8Oy/X4Jr271hpCFeBEOL/TrwIwpT2');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
