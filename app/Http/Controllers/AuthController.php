<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Auth\Authenticatable;

class AuthController extends Controller
{
	use Authenticatable;

	public function create()
	{
		return view('login');
	}

	public function login(LoginUserRequest $request)
	{
		$input = $request->all();

		$fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		if (auth()->attempt([$fieldType => $input['username'], 'password' => $input['password']])) {
			return redirect()->route('landing-worldwide');
		} else {
			return redirect()->route('login.create');
		}
	}

	public function reset()
	{
		return view('reset-password');
	}

	public function logout()
	{
		auth()->logout();
		return redirect('/');
	}
}
