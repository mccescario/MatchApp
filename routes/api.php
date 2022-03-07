<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomAuthController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\NewsFeedController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\TeamController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //return $request->user();
//});

Route::post('login',[CustomAuthController::class,'login']);
Route::post('register',[CustomAuthController::class,'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return Auth::user();
    });

    // API route for logout user
    Route::post('logout', [CustomAuthController::class,'logout']);

});



// for mobile api
Route::prefix('mobile')->group(function () {
    //LoginController
    Route::post('login',[LoginController::class,'login']);
    Route::post('register',[LoginController::class,'register']);
    Route::post('verify',[LoginController::class,'submit_verification']);
    Route::post('resend-verification',[LoginController::class,'resend_verification']);


    //ProfileController
    Route::prefix('profile')->group(function () {
        Route::patch('update/{id}',[ProfileController::class,'update']);
        Route::get('courses',[ProfileController::class,'getCourses']);

        Route::get('esport-categories',[ProfileController::class,'getEsportsCategories']);
        Route::get('sport-categories',[ProfileController::class,'getSportsCategories']);

        Route::patch('player-update/{id}',[ProfileController::class,'updatePlayerProfile']);

        Route::post('change-password',[ProfileController::class,'changePassword']);
    });

    //NewsFeedController
    Route::prefix('feed')->group(function () {
        Route::get('news', [NewsFeedController::class,'news']);
    });

    //TeamController
    Route::prefix('team')->group(function () {
        Route::get('teams',[TeamController::class,'teams']);
        Route::get('myteams/{id}',[TeamController::class,'myteams']);
    });
});