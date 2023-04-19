<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ResetPasswordController extends Controller
{
	public function show(): View
	{
		return view('reset-password');
	}
}
