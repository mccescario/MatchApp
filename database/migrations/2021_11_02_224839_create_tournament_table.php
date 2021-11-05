<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_models', function (Blueprint $table) {

            $table->id();
            $table->string('tournament_name');
            $table->date('tournament_date');
            $table->string('tournament_sport');
            $table->string('tournament_sport_type');
            $table->string('tournament_bracket');

            $table->string('enable_third_place');
            $table->string('bracket_size');
            $table->string('best_of_rounds');
            $table->string('num_groups');
            $table->string('num_player_per_group');
            $table->string('round_robin_match_style');
            $table->string('games_per_match');
            $table->string('tournament_fee');
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
        Schema::dropIfExists('tournament_models');
    }
}
