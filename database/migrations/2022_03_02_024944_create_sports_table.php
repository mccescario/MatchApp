<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('sport_category_id')->constrained();
            $table->string('sport_height')->nullable();
            $table->string('sport_weight')->nullable();
            $table->unsignedBigInteger('sport_primary_position_id')->nullable();
            $table->unsignedBigInteger('sport_secondary_position_id')->nullable();
            $table->timestamps();

            $table->foreign('sport_primary_position_id')->references('id')->on('sport_positions');
            $table->foreign('sport_secondary_position_id')->references('id')->on('sport_positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sports');
    }
}
