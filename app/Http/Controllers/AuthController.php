<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
	use Authenticatable;

	public function create(): View
	{
		return view('login');
	}

	public function login(LoginUserRequest $request): RedirectResponse
	{
		$input = $request->all();

		$fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		if (auth()->attempt([$fieldType => $input['username'], 'password' => $input['password']])) {
			return redirect()->route('landing-worldwide');
		} else {
			return redirect()->route('login.create');
		}
	}

	public function reset(): View
	{
		return view('reset-password');
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();
		return redirect('/');
	}
}
