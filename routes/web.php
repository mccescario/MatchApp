<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Host\Tournament_management;
use App\Http\Controllers\Host\Normal_management;
use App\Http\Controllers\Host\TournamentMatchesController;
use App\Http\Controllers\Normal\Dashboard_Player;
use App\Http\Controllers\Normal\NewsFeedController;
use App\Http\Controllers\Normal\Profile_management;
use App\Http\Controllers\Normal\TeamController;
<<<<<<< HEAD
=======
use App\Http\Controllers\Normal\TournamentManagement;
>>>>>>> dev/MC-revisions
use App\Models\Course;
use App\Models\OlympicCategory;
use App\Models\EsportCategory;
use App\Models\EsportRole;
use App\Models\Sport_Category;
use App\Models\SportCategory;

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


<<<<<<< HEAD


Route::get('/', function () {
    $olympics = OlympicCategory::all()->each(function($olympic){
        $olympic->makeVisible(['sport_categories','esport_categories']);
        if($olympic->sport_categories->count() != 0){
            $olympic->sport_categories->each(function($sport){
                $sport->sport_positions;
            });
        } else {
            unset($olympic->sport_categories);
        }

        if($olympic->esport_categories->count() != 0){
            $olympic->esport_categories->each(function($esport){
                $esport->esport_roles;
            });
        } else {
            unset($olympic->esport_categories);
        }
    });
    $olympics->makeHidden(['games']);
    $course = Course::all();
    $esport = EsportCategory::all();
    $esportrole = EsportRole::all();
    $sport = SportCategory::all();
    $sportrole = SportCategory::all();

    $data['olympics'] = $olympics;
    $data['courses'] = $course;
    $data['esport'] = $esport;
    $data['esportrole']= $esportrole;
    $data['sport'] = $sport;
    $data['sportrole'] = $sportrole;
    return view('main',$data);
});

Route::post('register-user', [HomeController::class,'store'])->name('register-user');

//Route::get('/', 'App\Http\Controllers\HomeController@logout')->name('logout');
Route::get('dashboard', 'App\Http\Controllers\HomeController@index');
Route::get('logout', 'App\Http\Controllers\HomeController@logout')->name('logout');
Route::post('login', [HomeController::class,'login'])->name('login');
Route::middleware(['auth'])->group(function () {
    
    Route::middleware(['rolehost:host'])->group(function () {
        // Host Routes
        Route::resource('tournament', Tournament_management::class);
        Route::resource('usermanagement', Normal_management::class);
        Route::resource('news-feed', NewsFeedController::class);
        Route::get('/register-tournament', 'App\Http\Controllers\Host\Tournament_management@create')->name('tournament-register');
        Route::post('/store-tournament', 'App\Http\Controllers\Host\Tournament_management@store')->name('tournament-store');
        Route::get('/tournament-management', 'App\Http\Controllers\Host\Tournament_management@index')->name('tournament_manage');
        Route::get('/host-dashboard', 'App\Http\Controllers\Host\Dashboard_Host@index')->name('host-dashboard');
        Route::get('/profile/{id}', 'App\Http\Controllers\Host\Profile_Host@index')->name('host-profile');
        Route::get('/team', 'App\Http\Controllers\Host\TeamController@index')->name('host-team');
        Route::get('/user-management', 'App\Http\Controllers\Host\Normal_management@index')->name('usermanagement');
        Route::get('/add-user', 'App\Http\Controllers\Host\Normal_management@create')->name('user-add');
        Route::get('/create-news', 'App\Http\Controllers\Normal\NewsFeedController@create')->name('news-create');
        Route::get('/news-read-more/{slug}', 'App\Http\Controllers\Normal\NewsFeedController@readmore')->name('news-readmore');
        //Route::get('/livestream', 'App\Http\Controllers\Host\Stream_management@index')->name('host-livestream');
        Route::get('/accept-tournament/{id}', 'App\Http\Controllers\Host\Tournament_management@accept')->name('accept.tournament');
    });

    Route::middleware(['roleplayer:player'])->group(function () {
        // Player Routes
        Route::resource('profilemanagement', Profile_management::class);
        //Route::resource('player-tournament', TournamentManagement::class);
        Route::get('/player-dashboard', 'App\Http\Controllers\Normal\Dashboard_Player@index')->name('player-dashboard');
        Route::get('/player-profile', 'App\Http\Controllers\Normal\Profile_management@index')->name('profile');
        Route::get('/player-team', 'App\Http\Controllers\Normal\TeamController@index')->name('team');
        // Route::get('/stream', 'StreamController@index')->name('stream');
        Route::get('/player-team/{id}', 'App\Http\Controllers\Normal\TeamController@show')->name('player-team');
        Route::post('/add-member-team', 'App\Http\Controllers\Normal\TeamController@add_member')->name('add.member.team');
        Route::post('/store-team', 'App\Http\Controllers\Normal\TeamController@store')->name('store.team');
        Route::get('/player-tournament', 'App\Http\Controllers\Normal\TournamentManagement@index')->name('player-tournament');
        Route::get('/join-tournament/{id}', 'App\Http\Controllers\Normal\TournamentManagement@join')->name('join.tournament');
        Route::post('/tournament-join/{id}', 'App\Http\Controllers\Normal\TournamentManagement@joining')->name('tournament.join');
        //Route::get('/stream', 'StreamController@index')->name('stream');
        Route::get('/invites/{id}', 'App\Http\Controllers\Normal\TeamController@invites')->name('invites');
        Route::get('join_invite/{id}/{respond}',[TeamController::class,'join_invite']);
    });

=======


Route::get('/', function () {
    $olympics = OlympicCategory::all()->each(function ($olympic) {
        $olympic->makeVisible(['sport_categories', 'esport_categories']);
        if ($olympic->sport_categories->count() != 0) {
            $olympic->sport_categories->each(function ($sport) {
                $sport->sport_positions;
            });
        } else {
            unset($olympic->sport_categories);
        }

        if ($olympic->esport_categories->count() != 0) {
            $olympic->esport_categories->each(function ($esport) {
                $esport->esport_roles;
            });
        } else {
            unset($olympic->esport_categories);
        }
    });
    $olympics->makeHidden(['games']);
    $course = Course::all();
    $esport = EsportCategory::all();
    $esportrole = EsportRole::all();
    $sport = SportCategory::all();
    $sportrole = SportCategory::all();

    $data['olympics'] = $olympics;
    $data['courses'] = $course;
    $data['esport'] = $esport;
    $data['esportrole'] = $esportrole;
    $data['sport'] = $sport;
    $data['sportrole'] = $sportrole;
    return view('main', $data);
});

Route::post('register-user', [HomeController::class, 'store'])->name('register-user');

//Route::get('/', 'App\Http\Controllers\HomeController@logout')->name('logout');
Route::get('dashboard', 'App\Http\Controllers\HomeController@index');
Route::get('logout', 'App\Http\Controllers\HomeController@logout')->name('logout');
Route::middleware(['auth'])->group(function () {

    Route::middleware(['rolehost:host'])->group(function () {
        // Host Routes
        Route::resource('tournament', Tournament_management::class);
        Route::resource('usermanagement', Normal_management::class);
        Route::resource('news-feed', NewsFeedController::class);
        Route::get('/register-tournament', 'App\Http\Controllers\Host\Tournament_management@create')->name('tournament-register');
        Route::post('/store-tournament', 'App\Http\Controllers\Host\Tournament_management@store')->name('tournament-store');
        Route::get('/tournament-management', 'App\Http\Controllers\Host\Tournament_management@index')->name('tournament_manage');
        Route::get('/host-dashboard', 'App\Http\Controllers\Host\Dashboard_Host@index')->name('host-dashboard');
        Route::get('/profile/{id}', 'App\Http\Controllers\Host\Profile_Host@index')->name('host-profile');
        Route::get('/team', 'App\Http\Controllers\Host\TeamController@index')->name('host-team');
        Route::get('/user-management', 'App\Http\Controllers\Host\Normal_management@index')->name('usermanagement');
        Route::get('/add-user', 'App\Http\Controllers\Host\Normal_management@create')->name('user-add');
        Route::get('/create-news', 'App\Http\Controllers\Normal\NewsFeedController@create')->name('news-create');
        Route::get('/news-read-more/{slug}', 'App\Http\Controllers\Normal\NewsFeedController@readmore')->name('news-readmore');
        //Route::get('/livestream', 'App\Http\Controllers\Host\Stream_management@index')->name('host-livestream');
        Route::get('/accept-tournament/{id}', 'App\Http\Controllers\Host\Tournament_management@accept')->name('accept.tournament');
        Route::get('/host-team/{team}/profile', 'App\Http\Controllers\Host\TeamController@profile')->name('host-team.profile');

        Route::prefix('tournament')->group(function () {
            Route::get('/{tournament}/bracket', [Tournament_management::class, 'bracket'])->name('tournament.bracket');
        });

        Route::prefix('matches')->group(function () {
            Route::get('/{tournamentMatch}', [TournamentMatchesController::class, 'show'])->name('matches.show');
            Route::post('/{tournamentMatch}/update-stream-link', [TournamentMatchesController::class, 'updateStreamLink'])->name('matches.update-stream-link');
        });
    });

    Route::middleware(['roleplayer:player'])->group(function () {
        // Player Routes
        Route::resource('profilemanagement', Profile_management::class);
        //Route::resource('player-tournament', TournamentManagement::class);
        Route::get('/player-dashboard', 'App\Http\Controllers\Normal\Dashboard_Player@index')->name('player-dashboard');
        Route::get('/player-profile', 'App\Http\Controllers\Normal\Profile_management@index')->name('profile');
        Route::get('/player-team', 'App\Http\Controllers\Normal\TeamController@index')->name('team');
        // Route::get('/stream', 'StreamController@index')->name('stream');
        Route::get('/player-team/{id}', 'App\Http\Controllers\Normal\TeamController@show')->name('player-team');
        Route::post('/add-member-team', 'App\Http\Controllers\Normal\TeamController@add_member')->name('add.member.team');
        Route::post('/store-team', 'App\Http\Controllers\Normal\TeamController@store')->name('store.team');
        Route::get('/player-tournament', 'App\Http\Controllers\Normal\TournamentManagement@index')->name('player-tournament');
        Route::get('/join-tournament/{id}', 'App\Http\Controllers\Normal\TournamentManagement@join')->name('join.tournament');
        Route::post('/tournament-join/{id}', 'App\Http\Controllers\Normal\TournamentManagement@joining')->name('tournament.join');
        //Route::get('/stream', 'StreamController@index')->name('stream');
        Route::get('/invites/{id}', 'App\Http\Controllers\Normal\TeamController@invites')->name('invites');
        Route::get('join_invite/{id}/{respond}', [TeamController::class, 'join_invite']);

        Route::prefix('newsfeed')->group(function () {
            Route::get('/tournament/{tournamentModel}', [TournamentManagement::class, 'show'])->name('newsfeed.tournament.show');
            Route::get('/tournament/{tournamentModel}/match/{tournamentMatch}', [TournamentManagement::class, 'showMatch'])->name('newsfeed.tournament.show.match');
            Route::get('/tournament', [Dashboard_Player::class, 'tournaments'])->name('newsfeed.tournament');
        });

        Route::get('/team/{team}/profile', [TeamController::class, 'profile'])->name('team.profile');
    });
>>>>>>> dev/MC-revisions
});
//Route::get('/member-profile/{member}', 'App\Http\Controllers\Normal\TeamController@member_view')->name('player-profile');



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
<<<<<<< HEAD
);*/
=======
);*/
>>>>>>> dev/MC-revisions
