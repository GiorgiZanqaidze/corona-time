<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('post-login', [AuthController::class, 'login'])->middleware('guest')->name('login.post');
Route::get('landing-worldwide', [AuthController::class, 'worldwide'])->name('worldwide')->middleware(['auth', 'verify_email']);
Route::get('landing-bycountry', [AuthController::class, 'byCountry'])->name('by-country')->middleware(['auth', 'verify_email']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('register', [RegisterController::class, 'registration'])->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'postRegistration'])->middleware('guest')->name('register.store');
Route::get('account/verify/{token}', [RegisterController::class, 'verifyAccount'])->name('user.verify');

Route::get('show-email', function () { return view('show-email'); })->name('show-email');

// Route::get('reset-password', [ResetPasswordController::class, 'show'])->middleware('guest')->name('reset-password.show');
// Route::get('confirm-password', [ResetPasswordController::class, 'show'])->middleware('guest')->name('confirm-password.show');

// Route::get('set-new-password', function () { return view('set-new-password'); })->middleware('guest')->name('set-new-password.page');
// Route::get('confirmation-email', function () { return view('sign-in-email'); })->middleware('guest')->name('sign-in-email.page');

// language route
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
