<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPasswordRequest extends FormRequest
{
	public function rules(): array
	{
		$rules = [
			'password'              => 'required|confirmed|min:3',
		];

		return $rules;
	}
}
