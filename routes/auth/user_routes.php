<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware(['guest'])->group(function() {
    Route::get('/register', [UserController::class, 'register_view'])->name('register');
    Route::post('/register', [UserController::class, 'register']);
    Route::get('/login', [UserController::class, 'login_view'])->name('login');
    Route::post('/login',  [UserController::class, 'login']);
});

Route::middleware(['auth.session'])->group(function() {
    Route::get('/user/{id}', [UserController::class, 'user_by_id'])->name('user_profile');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
});