<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('olympic_game_id')->constrained();
            // Sports
            $table->string('sport_profile_height')->nullable();
            $table->string('sport_profile_weight')->nullable();
            $table->string('sport_profile_primary_position')->nullable();
            $table->string('sport_profile_secondary_position')->nullable();
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
        Schema::dropIfExists('sport_profiles');
    }
}
