<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
	public function postPassword(UpdateUserRequest $request): RedirectResponse
	{
		$request->validated();
		$user = User::where('email', $request->email)->first();
		$token = $user->email_verification_token;

		Mail::to("$user->email")->send(new ResetPasswordMail($token));

		return redirect('show-email')->withSuccess('Great! You have Successfully loggedin');
	}

	public function edit(string $token): View
	{
		return view('set-new-password', ['token' => $token]);
	}

	public function update(string $token, UpdateUserPasswordRequest $request): RedirectResponse
	{
		$user = User::where('email_verification_token', $token)->first();
		$user->update($request->validated());
		return redirect()->route('confirmation-password');
	}
}
