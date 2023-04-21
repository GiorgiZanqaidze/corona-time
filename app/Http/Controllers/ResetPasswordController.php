<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
	public function postPassword(UpdateUserRequest $request): RedirectResponse
	{
		$user = User::where('email', $request->email)->first();
		if (!$user) {
			return redirect('reset-password')->withSuccess('There is no user related to this email');
		}
		$token = $user->remember_token;
		Mail::send('mails.password-mail', ['token' => $token], function ($message) use ($request) {
			$message->to($request->email);
			$message->subject('Password Verification Mail');
		});

		return redirect('show-email')->withSuccess('Great! You have Successfully loggedin');
	}

	public function edit(string $token): View
	{
		return view('set-new-password', ['token' => $token]);
	}

	public function update(string $token, UpdateUserPasswordRequest $request): RedirectResponse
	{
		$request->validated();
		$user = User::where('remember_token', $token)->first();
		$user->password = bcrypt($request->password);
		$user->update();
		return redirect()->route('confirmation-password');
	}
}
