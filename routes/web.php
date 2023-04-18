<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [AuthController::class, 'login'])->middleware('guest');
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('reset-password', [AuthController::class, 'reset'])->middleware('guest');
Route::get('landing-worldwide', [LandingController::class, 'worldwide'])->middleware('auth')->name('landing-worldwide');
Route::get('landing-bycountry', [LandingController::class, 'byCountry'])->middleware('auth')->name('landing-bycountry');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
