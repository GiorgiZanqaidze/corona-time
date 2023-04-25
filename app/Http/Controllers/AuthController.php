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

		if (Auth::attempt([$fieldType => $input['username'], 'password' => $input['password']], $request->has('remember'))) {
			return redirect()->route('worldwide');
		} else {
			return redirect()->route('login');
		}
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();
		return redirect('/');
	}
}
