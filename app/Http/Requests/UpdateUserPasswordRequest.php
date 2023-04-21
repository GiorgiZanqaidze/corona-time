<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPasswordRequest extends FormRequest
{
	public function rules(): array
	{
		$rules = [
			'password'              => 'required|min:3|required_with:password_confirmation',
			'password_confirmation' => 'required|string|min:3|same:password',
		];

		return $rules;
	}
}
