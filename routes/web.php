<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Host\Tournament_management;
use App\Http\Controllers\Host\Normal_management;
use App\Http\Controllers\Normal\Profile_management;

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
    return view('main');
});

Route::get('/logout', 'App\Http\Controllers\HomeController@logout');
Route::get('dashboard', 'App\Http\Controllers\HomeController@index');

// Admin Routes
Route::get('/admin-dashboard', 'App\Http\Controllers\Admin\Dashboard_Admin@index');

// Host Routes
Route::resource('tournament', Tournament_management::class);
Route::resource('usermanagement', Normal_management::class);
Route::get('/register-tournament', 'App\Http\Controllers\Host\Tournament_management@create')->name('tournament-register');
Route::get('/tournament-management', 'App\Http\Controllers\Host\Tournament_management@index')->name('tournament');
Route::get('/host-dashboard', 'App\Http\Controllers\Host\Dashboard_Host@index');
Route::get('/user-management', 'App\Http\Controllers\Host\Normal_management@index')->name('usermanagement');
Route::get('/add-user', 'App\Http\Controllers\Host\Normal_management@create')->name('user-add');



// Player Routes
Route::resource('profilemanagement', Profile_management::class);
Route::get('/player-dashboard', 'App\Http\Controllers\Normal\Dashboard_Player@index')->name('dashboard');
Route::get('/player-profile/{id}', 'App\Http\Controllers\Normal\Profile_management@index')->name('profile');
Route::get('/manage-team/{id}', 'App\Http\Controllers\Normal\TeamMatchmakingController@team_manage')->name('team-manage');
Route::get('/member-profile/{member}', 'App\Http\Controllers\Normal\TeamMatchmakingController@member_view')->name('player-profile');



/*
 Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware' => 'auth'], function() {

    Route::group(['middleware' => 'role:player', 'prefix' => 'player', 'as' => 'player.'], function() {
        Route::resource('dashboard_player', \App\Http\Controllers\Normal\Dashboard_Player::class );
        Route::resource('profile', \App\Http\Controllers\Normal\Profile_management::class );
        Route::resource('newsfeed', \App\Http\Controllers\Normal\NewsfeedController::class );
        Route::resource('stream', \App\Http\Controllers\Normal\StreamController::class );
        Route::resource('teams', \App\Http\Controllers\Normal\TeamMatchmakingController::class );
        Route::resource('schedule', \App\Http\Controllers\Normal\ScheduleController::class );
        Route::resource('search', \App\Http\Controllers\Normal\SearchController::class );
    });
    Route::group(['middleware' => 'role:host', 'prefix' => 'host', 'as' => 'host.'], function() {
        Route::resource('dashboard_host', \App\Http\Controllers\Host\Dashboard_Host::class );
        Route::resource('player-management', \App\Http\Controllers\Host\Normal_management::class );
        Route::resource('schedule-management', \App\Http\Controllers\Host\Schedule_management::class );
        Route::resource('stream-management', \App\Http\Controllers\Host\Stream_management::class );
        Route::resource('tournament-management', \App\Http\Controllers\Host\Tournament_management::class );
    });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('dashboard_admin', \App\Http\Controllers\Admin\Dashboard_Admin::class );
        Route::resource('user-management', \App\Http\Controllers\Admin\User_management::class );
        Route::resource('role-management', \App\Http\Controllers\Admin\Role_management::class );
        Route::resource('permission-management', controller: \App\Http\Controllers\Admin\Permission_management::class );
    });


}
);*/

