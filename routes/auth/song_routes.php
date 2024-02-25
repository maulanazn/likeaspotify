<?php
use Illuminate\Support\Facades\Route;

Route::get('/song', null);
Route::middleware(['auth.session', 'artist'])->group(function() {
    Route::get('/song/{artist_id}', null)->name('artist_song');
    Route::post('/song/{artist_id}', null);
    Route::get('/song/{id}', null)->name('song_id');
    Route::put('/song/{id}', null);
    Route::delete('/song/{id}', null);
});