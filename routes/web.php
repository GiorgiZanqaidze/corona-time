<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
	Route::post('post-login', 'login')->middleware('guest')->name('login.post');
	Route::get('logout', 'logout')->name('logout')->middleware(['auth', 'verify_email']);
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
		Route::post('reset-password', 'postPassword')->name('reset-password.post');
		Route::get('account/verify/password/{token}', 'edit')->name('user.update');
		Route::patch('account/verify/password/{token}', 'update')->name('user.edit');
	});

	Route::view('/', 'login')->name('login');
	Route::view('register', 'register')->name('register');
	Route::view('show-email', 'show-email')->name('show-email');
	Route::view('set-new-password', 'set-new-password')->name('set-new-password');
	Route::view('reset-password', 'reset-password')->name('reset-password');
	Route::view('confirmation-password', 'confirmation-password')->name('confirmation-password');
});

Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
