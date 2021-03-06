<?php


use App\Http\Controllers\ApiAjaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Router;
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

Route::get('/', [ ContentController::class,'index'])->name('home');

// Store
Route::resource('store',StoreController::class);

// Cart
Route::resource('/cart', CartController::class);

// Auth
Route::get('login', [ LoginController::class, 'showLogin'])->name('login');
Route::post('login', [ LoginController::class, 'login'])->name('loginUser');
Route::get('registro', [ LoginController::class, 'showRegister'])->name('register');
Route::post('registro', [ LoginController::class, 'register'])->name('registerUser');
Route::get('logout', [ LoginController::class, 'logout'])->name('logout');
Route::get('recover', [ LoginController::class, 'recover'])->name('recover');
Route::post('recover', [LoginController::class, 'mailRecover'])->name('mail.recover');
Route::get('reset', [LoginController::class, 'formResetPassword'])->name('reset');
Route::post('reset', [LoginController::class, 'resetPassword'])->name('resetPass');

// Perfil
Route::resource('perfil', UserController::class)->only('edit','update')->middleware('auth');
Route::post('perfil/{perfil}/avatar', [UserController::class,'avatar'])->name('perfil.avatar');
Route::post('perfil/{perfil}/pass', [UserController::class,'updatePassword'])->name('perfil.updatePass');

// Productos
Route::resource('product', ProductController::class)->only('show');

// Ajax Api Routers
Route::get('md/api/load/products/{section}',[ApiAjaxController::class,'getProductsSection']);
Route::post('md/api/favorites/add/{id}/{module}',[ApiAjaxController::class,'postFavoriteAdd']);
Route::post('md/api/load/user/favorites/',[ApiAjaxController::class,'postUserProductFavorites']);

