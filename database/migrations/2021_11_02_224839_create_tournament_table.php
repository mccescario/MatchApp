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
            $table->integer('tournament_sport_type');
            $table->integer('tournament_sport')->nullable();
            $table->integer('tournament_esport')->nullable();

            $table->integer('tournament_format');
            $table->integer('tournament_size');
            $table->integer('tournament_series')->nullable();
            $table->integer('tournament_participant_play')->nullable();

            $table->date('tournament_date_from');
            $table->date('tournament_date_to');
            $table->string('tournament_time');

            $table->timestamps();

            /*
            $table->string('enable_third_place')->nullable();
            $table->integer('single_bracket_size')->nullable();
            $table->integer('single_best_of_rounds')->nullable();
            $table->integer('double_bracket_size')->nullable();
            $table->integer('double_best_of_rounds')->nullable();
            $table->integer('num_groups')->nullable();
            $table->integer('num_player_per_group')->nullable();
            $table->integer('round_robin_match_style')->nullable();
            $table->integer('games_per_match')->nullable();
            $table->integer('tournament_fee');
            $table->integer('tournament_price')->nullable();
            */

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
