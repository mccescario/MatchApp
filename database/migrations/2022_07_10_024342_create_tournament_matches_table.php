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
        Schema::create('tournament_matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_1_id')->nullable();
            $table->unsignedBigInteger('team_2_id')->nullable();
            $table->integer('team_1_score')->default(0);
            $table->integer('team_2_score')->default(0);
            $table->integer('winning_team')->nullable();
            $table->integer('order');
            $table->integer('level');

            $table->boolean('is_current')->default(false);
            $table->string('stream_link', 500)->nullable();

            $table->unsignedBigInteger('tournament_id');

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
        Schema::dropIfExists('tournament_matches');
    }
};
