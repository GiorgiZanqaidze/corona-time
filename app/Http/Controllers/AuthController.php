<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
	public function create()
	{
		return view('login');
	}

	public function register()
	{
		return view('register');
	}

	public function reset()
	{
		return view('reset-password');
	}
}
