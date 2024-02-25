<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.session', 'artist'])->group(function() {
    Route::get('/concert/{artist_id}', null)->name('artist_concert');
    Route::post('/concert/{artist_id}', null);
    Route::get('/concert/{id}', null)->name('concert_id');
    Route::put('/concert/{id}', null);
    Route::delete('/concert/{id}', null);
});