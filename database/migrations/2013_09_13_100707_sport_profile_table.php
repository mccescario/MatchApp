<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SportProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('sport_profile', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            // Esports
            $table->string('ign')->nullable();
            $table->string('level')->nullable();
            $table->string('rank')->nullable();
            // $table->string('position')->nullable();
            $table->string('win_rate')->nullable();
            // Sports
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            // $table->string('primary_pos')->nullable();
            // $table->string('secondary_pos')->nullable();
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
        //
        Schema::dropIfExists('sport_profile');
    }
}
