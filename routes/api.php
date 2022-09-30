<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\ResourcesController;
use App\Http\Controllers\API\TeamsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'mobile'], function () {

    // Auth
    Route::post('login', [AuthController::class, 'login']);
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('profile', [AuthController::class, 'profile']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
    Route::post('register-player', [AuthController::class, 'register_player']);
    Route::post('register-host', [AuthController::class, 'register_host']);

    Route::group(['prefix' => 'profile'], function () {
        Route::post('update/{user}', [ProfileController::class, 'update_player']);
        Route::post('change-password', [AuthController::class, 'change_password']);
    });

    Route::group(['prefix' => 'resources'], function () {
        Route::get('user-filter', [ResourcesController::class, 'user_filter']);
        Route::get('courses', [ResourcesController::class, 'courses']);
        Route::get('sport-categories', [ResourcesController::class, 'sport_categories']);
        Route::get('sport-categories/{sportCategory}/sports', [ResourcesController::class, 'sports_by_category']);
        Route::get('sports', [ResourcesController::class, 'sports']);
        Route::get('teams', [ResourcesController::class, 'teams']);
        Route::get('teams/{id}', [ResourcesController::class, 'team']);
    });

    Route::group(['prefix' => 'teams'], function () {
        Route::post('store', [TeamsController::class, 'store']);
        Route::post('invite', [TeamsController::class, 'invite']);
        Route::post('invitations', [TeamsController::class, 'invitations']);
        Route::post('invite-response', [TeamsController::class, 'invite_response']);
    });
});
