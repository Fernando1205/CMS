<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth','IsAdmin')->group(function() {

    Route::get('', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Users
    Route::resource('users', UserController::class);

    // Productos
    Route::resource('products', ProductController::class);
    Route::post('products/{product}/gallery', [ProductController::class, 'gallery'])->name('products.gallery');

    // Galeria productos
    Route::resource('gallery', ProductGalleryController::class)->only('destroy');

    // Categorias
    Route::get('categories/{module}', [ CategoryController::class, 'index'])->name('categories.name.module');
    Route::resource('categories', CategoryController::class);

});
