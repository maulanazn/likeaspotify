<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.session', 'artist', 'web'])->group(function() {
    Route::get('/album/{user_id}', null)->name('album');
    Route::get('/album/{id}', null)->name('album_id');
    Route::put('/album/{id}', null);
    Route::delete('/album/{id}', null);
});