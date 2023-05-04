<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
	public function rules(): array
	{
		$rules = [
			'username'              => 'required|min:3|max:255|unique:users,username',
			'email'                 => 'required|email|max:255|unique:users,email',
			'password'              => 'required|confirmed|min:3',
		];

		return $rules;
	}

	protected function prepareForValidation()
	{
		$token = Str::random(64);
		$this->merge([
			'remember_token' => $token,
		]);
	}
}
