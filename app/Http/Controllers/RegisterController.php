<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Mail\VerifyEmailMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
	public function postRegistration(StoreUserRequest $request): RedirectResponse
	{
		$createUser = User::create($request->validated());
		$token = $request->email_verification_token;
		$createUser->email_verification_token = $request->email_verification_token;
		$createUser->update();

		Mail::to("$createUser->email")->send(new VerifyEmailMail($token));

		return redirect('show-email')->withSuccess('Great! You have Successfully loggedin');
	}

	public function verifyAccount($token)
	{
		$verifyUser = User::where('email_verification_token', $token)->first();

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
