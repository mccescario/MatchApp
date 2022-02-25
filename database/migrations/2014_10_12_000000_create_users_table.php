<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('profile_id')->references('id')->on('sport_profile');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role')->nullable();
            $table->string('host_key')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('status')->nullable();
            $table->string('sport_type')->nullable();
            $table->string('sport')->nullable();
            $table->string('esport')->nullable();
            $table->rememberToken();
            //$table->foreignId('current_team_id')->nullable();
            $table->foreignId('team')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('verification_code')->nullable();
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
        Schema::dropIfExists('users');
    }
}
