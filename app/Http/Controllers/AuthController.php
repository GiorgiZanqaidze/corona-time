<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	use Authenticatable;

	public function login(LoginUserRequest $request): RedirectResponse
	{
		$input = $request->all();

		$fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		if (auth()->attempt([$fieldType => $input['username'], 'password' => $input['password']])) {
			return redirect()->route('worldwide');
		} else {
			return redirect()->route('login.create');
		}
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();
		return redirect('/');
	}

	public function index()
	{
		return view('login');
	}

	public function registration()
	{
		return view('register');
	}

	public function worldwide()
	{
		if (Auth::check()) {
			return view('landing-worldwide');
		}

		return redirect('/')->withSuccess('Opps! You do not have access');
	}

	public function byCountry()
	{
		if (Auth::check()) {
			return view('landing-bycountry');
		}

		return redirect('/')->withSuccess('Opps! You do not have access');
	}
}
