<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomAuthController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\NewsFeedController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\TournamentController;
use App\Models\Esport;
use App\Models\EsportRole;
use App\Models\Team;
use App\Models\TeamInvitation;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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
    Route::get('users', function () {
        $users = User::with(['esport'])->get();
        return response()->json($users, 200);
    });

    //LoginController
    Route::post('login',[LoginController::class,'login']);
    Route::post('register',[LoginController::class,'register']);
    Route::post('verify',[LoginController::class,'submit_verification']);
    Route::post('resend-verification',[LoginController::class,'resend_verification']);
    Route::get('register-details',[LoginController::class,'register_details']);


    //ProfileController
    Route::prefix('profile')->group(function () {
        Route::patch('update/{id}',[ProfileController::class,'update']);
        Route::get('courses',[ProfileController::class,'getCourses']);

        Route::get('esport-categories',[ProfileController::class,'getEsportsCategories']);
        Route::get('sport-categories',[ProfileController::class,'getSportsCategories']);

        Route::patch('player-update/{id}',[ProfileController::class,'updatePlayerProfile']);

        Route::get('player-profile-fields/{user_id}/{olympic_category_id}', [ProfileController::class,'updatePlayerProfileFields']);

        Route::post('insert-update-usersport', [ProfileController::class,'insertOrUpdateNewUserSport']);

        Route::post('insert-update-useresport', [ProfileController::class,'insertOrUpdateNewUserEsport']);

        Route::post('change-password',[ProfileController::class,'changePassword']);

        Route::post('update-profile-photo', [ProfileController::class,'updateProfilePhoto']);
    });

    //NewsFeedController
    Route::prefix('feed')->group(function () {
        Route::get('news', [NewsFeedController::class,'news']);
        Route::post('create', [NewsFeedController::class,'create']);
    });

    //TeamController
    Route::prefix('team')->group(function () {
        Route::get('teams',[TeamController::class,'teams']);
        Route::get('my-esport-teams/{id}',[TeamController::class,'esport_user_teams']);
        Route::get('my-sport-teams/{id}',[TeamController::class,'sport_user_teams']);

        Route::get('team-members/{user_id}/{olympic_category_id}',[TeamController::class,'get_team_members']);

        // Route::get('esport-team-members/{team_id}/{user_id}',[TeamController::class,'get_esport_team_members']);
        // Route::get('sport-team-members/{team_id}/{user_id}',[TeamController::class,'get_sport_team_members']);

        Route::get('game-categories', [TeamController::class,'game_categories']);
        Route::get('get-games-by-category-name/{olympic_category_name}', [TeamController::class,'getGameByCategoryName']);

        Route::post('create-team', [TeamController::class,'createTeam']);
        Route::get('get-filters/{game_id}/{category_id}', [TeamController::class,'getFilters']);
        Route::get('filter-user', [TeamController::class,'filterUser']);

        Route::post('recruite-member',[TeamController::class,'recruiteMember']);

        Route::get('invitations/{user_id}/{category_id}', [TeamController::class,'invitations']);
        Route::get('invitations-category', [TeamController::class,'invitationsCategory']);
        Route::post('invite-response', [TeamController::class,'inviteResponse']);

        Route::get('all-members/{id}/{category_id}', function ($id,$category_id) {

        });
    });

    //Route::prefix('tournament')->group(function () {
      //  Route::get('tournaments', [TournamentController::class,'tournamentList']);
    //});
});
