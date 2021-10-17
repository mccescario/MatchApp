<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_profile', function (Blueprint $table) {
            $table->id();

            /* Personal Details */
            $table->date('birthdate');
            $table->string('address');
            $table->integer('contactno');
            $table->string('nationality');
            $table->string('status');

            /* Player Sport Information */
            $table->integer('height');
            $table->integer('weight');
            $table->string('primary_pos');
            $table->string('secondary_pos');

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
        Schema::dropIfExists('player_profile');
    }
}
