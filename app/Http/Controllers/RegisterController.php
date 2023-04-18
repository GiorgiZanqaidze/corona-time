<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\View\View;

class RegisterController extends Controller
{
	public function create(): View
	{
		return view('register');
	}

	public function store(StoreUserRequest $request)
	{
		$validated = $request->validated();
		dd(request()->all());
	}
}
