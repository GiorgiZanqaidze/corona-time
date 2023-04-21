<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
	public function rules(): array
	{
		$rules = [
			'email'=> 'required|email|max:255',
		];

		return $rules;
	}
}
