<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*
Route::group(['middleware' => 'auth'],function(){

    Route::group(['middleware' => 'role:player', 'prefix'=> 'player', 'as' => 'player.'], function() {
        Route::resource(name: 'dashboard_player', controller: \App\Http\Controllers\Normal\Dashboard_Player::class );
        Route::resource(name: 'profile', controller: \App\Http\Controllers\Normal\Profile_management::class );
        Route::resource(name: 'newsfeed', controller: \App\Http\Controllers\Normal\NewsfeedController::class );
        Route::resource(name: 'stream', controller: \App\Http\Controllers\Normal\StreamController::class );
        Route::resource(name: 'teams', controller: \App\Http\Controllers\Normal\TeamMatchmakingController::class );
        Route::resource(name: 'schedule', controller: \App\Http\Controllers\Normal\ScheduleController::class );
        Route::resource(name: 'search', controller: \App\Http\Controllers\Normal\SearchController::class );
    });
    Route::group(['middleware' => 'role:host', 'prefix'=> 'host', 'as' => 'host.'], function() {
        Route::resource(name: 'dashboard_host', controller: \App\Http\Controllers\Host\Dashboard_Host::class );
        Route::resource(name: 'player-management', controller: \App\Http\Controllers\Host\Normal_management::class );
        Route::resource(name: 'schedule-management', controller: \App\Http\Controllers\Host\Schedule_management::class );
        Route::resource(name: 'stream-management', controller: \App\Http\Controllers\Host\Stream_management::class );
        Route::resource(name: 'tournament-management', controller: \App\Http\Controllers\Host\Tournament_management::class );
    });
    Route::group(['middleware' => 'role:admin', 'prefix'=> 'admin', 'as' => 'admin.'], function() {
        Route::resource(name: 'dashboard_admin', controller: \App\Http\Controllers\Admin\Dashboard_Admin::class );
        Route::resource(name: 'user-management', controller: \App\Http\Controllers\Admin\User_management::class );
        Route::resource(name: 'role-management', controller: \App\Http\Controllers\Admin\Role_management::class );
        Route::resource(name: 'permission-management', controller: \App\Http\Controllers\Admin\Permission_management::class );
    });


});
*/
