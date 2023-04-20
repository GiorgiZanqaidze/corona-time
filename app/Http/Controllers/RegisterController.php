<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Hash;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
	public function registration(): View
	{
		return view('register');
	}

	public function postRegistration(StoreUserRequest $request): RedirectResponse
	{
		$request->validated();
		$data = $request->post();
		$createUser = $this->create($data);
		$token = Str::random(64);
		$createUser->remember_token = $token;
		$createUser->save();

		Mail::send('mails.register-mail', ['token' => $token], function ($message) use ($request) {
			$message->to($request->email);
			$message->subject('Email Verification Mail');
		});

		return redirect('show-email')->withSuccess('Great! You have Successfully loggedin');
	}

	public function create(array $data)
	{
		return User::create([
			'username'       => $data['username'],
			'email'          => $data['email'],
			'password'       => Hash::make($data['password']),
		]);
	}

	public function verifyAccount($token): View
	{
		$verifyUser = User::where('remember_token', $token)->first();

		$message = 'Sorry your email cannot be identified.';

		if (!is_null($verifyUser)) {
			if (!$verifyUser->email_verified) {
				$verifyUser->email_verified = 1;
				$verifyUser->save();
			} else {
				$message = 'Your e-mail is already verified. You can now login.';
			}
		}

		return view('confirmation-email');
	}
}
