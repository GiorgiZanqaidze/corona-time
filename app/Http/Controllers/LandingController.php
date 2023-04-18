<?php

namespace App\Http\Controllers;

class LandingController extends Controller
{
	public function worldwide()
	{
		return view('landing-worldwide');
	}

	public function byCountry()
	{
		return view('landing-bycountry');
	}
}
