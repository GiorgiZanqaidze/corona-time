<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
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
Route::controller(AuthController::class)->group(function () {
	Route::post('post-login', 'login')->middleware('guest')->name('login.post');
	Route::post('logout', 'logout')->name('logout')->middleware(['auth', 'verify_email']);
});

Route::controller(DashboardController::class)->group(function () {
	Route::get('landing-worldwide', 'worldwide')->name('worldwide')->middleware('verify_email');
	Route::get('landing-bycountry', 'byCountry')->name('by-country')->middleware('verify_email');
});

Route::controller(DashboardController::class)->group(function () {
	Route::post('register', 'postRegistration')->middleware('guest')->name('register.store');
	Route::get('account/verify/{token}', 'verifyAccount')->name('user.verify');
});

Route::controller(DashboardController::class)->group(function () {
	Route::post('reset-password', 'postPassword')->middleware('guest')->name('reset-password');
	Route::get('account/verify/password/{token}', 'edit')->middleware('guest')->name('user.update');
	Route::patch('account/verify/password/{token}', 'update')->middleware('guest')->name('user.edit');
});

Route::get('/', function () { return view('login'); })->middleware('guest')->name('login');
Route::get('register', function () { return view('register'); })->middleware('guest')->name('register');
Route::get('show-email', function () { return view('show-email'); })->middleware('auth')->name('show-email');
Route::get('set-new-password', function () { return view('set-new-password'); })->middleware('guest')->name('set-new-password');
Route::get('reset-password', function () { return view('reset-password'); })->middleware('guest')->name('reset-password');
Route::get('confirmation-password', function () { return view('confirmation-password'); })->middleware('guest')->name('confirmation-password');

// language route
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
