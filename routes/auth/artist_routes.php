<?php
use App\Http\Controllers\ArtistController;
use Illuminate\Support\Facades\Route;

Route::prefix('/artist')->group(function() {
    Route::middleware(['auth.session', 'web'])->group(function() {
        Route::get('/register', [ArtistController::class, 'create'])->name('register_artist');
        Route::post('/register', [ArtistController::class, 'store']);
    });
    
    Route::middleware(['auth.session', 'artist'])->group(function() {
        Route::get('/dashboard', [ArtistController::class, 'dashboard'])->name('dashboard');
        Route::get('/edit/{id}', [ArtistController::class, 'edit'])->name('artist_edit');
        Route::put('/edit/{id}', [ArtistController::class, 'update'])->name('artist_update');
    });
});