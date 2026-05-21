<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});



Route::get('/login', [AuthController::class, 'form'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/cahaya', [DashboardController::class, 'cahaya'])->name('cahaya');
    Route::get('/tanah', [DashboardController::class, 'tanah'])->name('tanah');
    Route::get('/air', [DashboardController::class, 'air'])->name('air');
    
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});


Route::get('/api/sensor', [DashboardController::class, 'apiSensor']);