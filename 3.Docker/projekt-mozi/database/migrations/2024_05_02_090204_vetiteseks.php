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
        if (!Schema::hasTable('vetiteseks')){
            Schema::create('vetiteseks', function (Blueprint $table) {
                $table->id();
                $table->foreignId('movie_id')->constrained('movies');
                $table->foreignId('room_id')->constrained('rooms');
                $table->dateTime('start_time'); // A vetítés kezdési időpontja
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vetiteseks');
    }
};
