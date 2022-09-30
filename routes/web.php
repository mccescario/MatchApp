<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::get('/player-register', [AuthController::class, 'registerPlayer'])->name('user.registration.player');
Route::post('/player-register', [AuthController::class, 'storePlayer'])->name('user.registration.player.store');

Route::get('/host-register', [AuthController::class, 'registerHost'])->name('user.registration.host');
Route::post('/host-register', [AuthController::class, 'storeHost'])->name('user.registration.host.store');
