<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
	public function create(): View
	{
		return view('register');
	}

	public function store(StoreUserRequest $request): RedirectResponse
	{
		$validated = $request->validated();
		$user = User::create($validated);
		$user['password'] = bcrypt($user['password']);
		auth()->login($user);
		$user->save();
		return redirect('landing-worldwide');
	}
}
