<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEsportProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esport_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('olympic_game_id')->constrained();
            // Esports
            $table->string('esport_profile_name')->nullable();
            $table->string('esport_profile_level')->nullable();
            $table->string('esport_profile_rank')->nullable();
            $table->string('esport_profile_role')->nullable();
            $table->string('esport_profile_win_rate')->nullable();
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
        Schema::dropIfExists('esport_profiles');
    }
}
