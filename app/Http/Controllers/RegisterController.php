<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
	public function postRegistration(StoreUserRequest $request): RedirectResponse
	{
		$createUser = User::create($request->validated());
		$token = Str::random(64);
		$createUser->remember_token = $token;
		$createUser->password = bcrypt($request->password);
		$createUser->save();

		Mail::send('mails.register-mail', ['token' => $token], function ($message) use ($request) {
			$message->to($request->email);
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
