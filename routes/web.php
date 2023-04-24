<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () { return view('login'); })->middleware('guest')->name('login');
Route::post('post-login', [AuthController::class, 'login'])->middleware('guest')->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware(['auth', 'verify_email']);

Route::get('landing-worldwide', [DashboardController::class, 'worldwide'])->name('worldwide')->middleware(['auth', 'verify_email']);
Route::get('landing-bycountry', [DashboardController::class, 'byCountry'])->name('by-country')->middleware(['auth', 'verify_email']);

Route::get('register', function () { return view('register'); })->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'postRegistration'])->middleware('guest')->name('register.store');
Route::get('show-email', function () { return view('show-email'); })->name('show-email');
Route::get('account/verify/{token}', [RegisterController::class, 'verifyAccount'])->name('user.verify');

Route::post('reset-password', [ResetPasswordController::class, 'postPassword'])->middleware('guest')->name('reset-password');
Route::get('account/verify/password/{token}', [ResetPasswordController::class, 'edit'])->middleware('guest')->name('user.update');
Route::patch('account/verify/password/{token}', [ResetPasswordController::class, 'update'])->middleware('guest')->name('user.edit');
Route::get('set-new-password', function () { return view('set-new-password'); })->middleware('guest')->name('set-new-password');
Route::get('reset-password', function () { return view('reset-password'); })->middleware('guest')->name('reset-password');
Route::get('confirmation-password', function () { return view('confirmation-password'); })->middleware('guest')->name('confirmation-password');

// language route
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
