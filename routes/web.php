<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
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

Route::get('/', [AuthController::class, 'create'])->middleware('guest')->name('login.create');
Route::post('login', [AuthController::class, 'login'])->middleware('guest')->name('login.post');
Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');
Route::get('landing-worldwide', [LandingController::class, 'worldwide'])->middleware('auth')->name('landing-worldwide');
Route::get('landing-bycountry', [LandingController::class, 'byCountry'])->middleware('auth')->name('landing-bycountry');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('reset-password', [ResetPasswordController::class, 'show'])->middleware('guest')->name('reset-password.show');
Route::get('confirm-password', [ResetPasswordController::class, 'show'])->middleware('guest')->name('reset-password.show');
Route::get('email-confirmation', function () { return view('confirmation-email'); })->middleware('guest')->name('confirm-password.page');
Route::get('set-new-password', function () { return view('set-new-password'); })->middleware('guest')->name('set-new-password.page');
Route::get('sign-in-email', function () { return view('sign-in-email'); })->middleware('guest')->name('sign-in-email.page');

// language route
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
