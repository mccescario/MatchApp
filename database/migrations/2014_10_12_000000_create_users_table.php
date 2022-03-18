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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('age')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->nullable();
            $table->string('course')->nullable();
            $table->string('student_number')->nullable();
            $table->string('password');
            $table->integer('role')->nullable();
            $table->string('host_key')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('status')->nullable();
            // $table->foreignId('sport_id')->nullable()->change();
            // $table->foreignId('esport_id')->nullable()->change();
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
