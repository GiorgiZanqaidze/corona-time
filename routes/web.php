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
Route::controller(AuthController::class)->group(function () {
	Route::post('post-login', 'login')->middleware('guest')->name('login.post');
	Route::post('logout', 'logout')->name('logout')->middleware(['auth', 'verify_email']);
});

Route::middleware(['auth', 'verify_email'])->group(function () {
	Route::controller(DashboardController::class)->group(function () {
		Route::get('landing-worldwide', 'worldwide')->name('worldwide');
		Route::get('landing-bycountry', 'byCountry')->name('by-country');
	});
});

Route::middleware('guest')->group(function () {
	Route::controller(RegisterController::class)->group(function () {
		Route::post('register', 'postRegistration')->name('register.store');
		Route::get('account/verify/{token}', 'verifyAccount')->name('user.verify');
	});

	Route::controller(ResetPasswordController::class)->group(function () {
		Route::post('reset-password', 'postPassword')->name('reset-password');
		Route::get('account/verify/password/{token}', 'edit')->name('user.update');
		Route::patch('account/verify/password/{token}', 'update')->name('user.edit');
	});

	Route::get('/', function () { return view('login'); })->name('login');
	Route::get('register', function () { return view('register'); })->name('register');
	Route::get('show-email', function () { return view('show-email'); })->name('show-email');
	Route::get('set-new-password', function () { return view('set-new-password'); })->name('set-new-password');
	Route::get('reset-password', function () { return view('reset-password'); })->name('reset-password');
	Route::get('confirmation-password', function () { return view('confirmation-password'); })->name('confirmation-password');
});

// language route
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
