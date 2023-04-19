<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		$rules = [
			'username'              => 'required|min:3|max:255|unique:users,username',
			'email'                 => 'required|email|max:255|unique:users,email',
			'password'              => 'required|min:7|max:255',
			'password_confirmation' => 'required|string|min:8|max:255',
		];

		return $rules;
	}
}
