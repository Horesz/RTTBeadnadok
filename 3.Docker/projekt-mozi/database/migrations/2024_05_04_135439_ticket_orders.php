<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_orders', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('phone');
            $table->string('category');
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('room_id');
            $table->string('seat_number'); // Az ülőhely azonosítója
            $table->dateTime('film_start');
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_orders');
    }
};
