<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth','IsAdmin')->group(function() {
    Route::get('', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', UserController::class);
});
