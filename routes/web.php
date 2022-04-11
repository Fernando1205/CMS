<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [ LoginController::class, 'showLogin'])->name('login');
Route::post('login', [ LoginController::class, 'login'])->name('loginUser');
Route::get('registro', [ LoginController::class, 'showRegister'])->name('register');
Route::post('registro', [ LoginController::class, 'register'])->name('registerUser');
Route::get('logout', [ LoginController::class, 'logout'])->name('logout');
Route::get('recover', [ LoginController::class, 'recover'])->name('recover');
Route::post('recover', [LoginController::class, 'mailRecover'])->name('mail.recover');
Route::get('reset', [LoginController::class, 'resetPassword'])->name('reset');

