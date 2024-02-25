<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('noauth.welcome');
})->name('home');

require(__DIR__.'/auth/user_routes.php');
require(__DIR__.'/auth/artist_routes.php');
require(__DIR__.'/auth/song_routes.php');
require(__DIR__.'/auth/album_routes.php');
require(__DIR__.'/auth/concert_routes.php');