<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth','IsAdmin','userStatus')->group(function() {

    Route::get('', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Users
    Route::resource('users', UserController::class)->only('index','edit','update','destroy')->middleware('userPermissions');
    Route::get('users/{status}/filter', [UserController::class, 'filter'])->name('users.filter');
    Route::get('users/permissions/{user}', [UserController::class, 'permissions'])->name('users.permission')->middleware('userPermissions');
    Route::post('users/permissions/{user}', [UserController::class, 'userPermissions'])->name('users.permission.post')->middleware('userPermissions');

    // Productos
    Route::resource('products', ProductController::class)->except('show')->middleware('userPermissions');
    Route::get('products/{status}/filter', [ProductController::class, 'filter'])->name('products.filter');
    Route::post('products/search', [ProductController::class, 'search'])->name('products.search');
    Route::post('products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
    Route::post('products/{product}/gallery', [ProductController::class, 'gallery'])->name('products.gallery')->middleware('userPermissions');
    Route::get('products/{product}/inventory', [ProductController::class, 'inventory'])->name('products.inventory');

    // Invetario productos
    Route::resource('inventory',InventoryController::class)->only('store','edit','update','destroy');

    // Variantes inventory
    Route::post('inventory/{inventory}/variant', [ InventoryController::class, 'productInvVariant'])->name('variant');
    Route::delete('inventory/{variant}/variant/', [ InventoryController::class, 'invVarDestroy'])->name('variant.destroy');

    // Galeria productos
    Route::resource('gallery', ProductGalleryController::class)->only('destroy')->middleware('userPermissions');

    // Categorias
    Route::get('categories/{module}', [ CategoryController::class, 'index'])->name('categories.name.module')->middleware('userPermissions');
    Route::resource('categories', CategoryController::class)->except('show','index')->middleware('userPermissions');

    // Configuraciones
    Route::resource('settings', SettingsController::class)->only('index')->middleware('userPermissions');
    Route::post('settings', [SettingsController::class, 'postHome'])->name('settings');

    // Slider
    Route::get('slider',SliderController::class)->name('slider.index')->middleware('userPermissions');
    Route::resource('slider', SliderController::class)->only('store','edit','destroy','update');


});
