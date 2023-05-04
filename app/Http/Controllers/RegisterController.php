<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
	public function postRegistration(StoreUserRequest $request): RedirectResponse
	{
		$createUser = User::create($request->validated());
		$token = $request->remember_token;
		$createUser->remember_token = $request->remember_token;
		$createUser->save();

		Mail::send('mails.register-mail', ['token' => $token], function ($message) use ($createUser) {
			$message->to($createUser->email);
			$message->subject('Email Verification Mail');
		});

		return redirect('show-email')->withSuccess('Great! You have Successfully loggedin');
	}

	public function verifyAccount($token)
	{
		$verifyUser = User::where('remember_token', $token)->first();

		if (!is_null($verifyUser)) {
			if (!$verifyUser->email_verified) {
				$verifyUser->email_verified = 1;
				$verifyUser->save();
			}
			return view('confirmation-email');
		}

		return redirect()->route('login');
	}
}
