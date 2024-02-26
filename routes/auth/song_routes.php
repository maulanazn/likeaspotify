<?php
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.session', 'artist'])->prefix('/song')->group(function() {
    Route::get('/songs', [SongController::class, 'index'])->name('artist_song');
    Route::get('/', [SongController::class, 'create'])->name('create_song');
    Route::post('/', [SongController::class, 'store']);
    Route::get('/{id}', [SongController::class, 'show'])->name('song_id');
    Route::put('/{id}', [SongController::class, 'update']);
    Route::delete('/{id}', [SongController::class, 'destroy']);
});