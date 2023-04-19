<?php

namespace App\Http\Controllers;

use App\Models\Country;

class LandingController extends Controller
{
	public function worldwide()
	{
		$countryData = Country::all();
		$confirmed = $countryData->sum('confirmed');
		$recovered = $countryData->sum('recovered');
		$deaths = $countryData->sum('deaths');
		return view('landing-worldwide', [
			'confirmed' => $confirmed,
			'recovered' => $recovered,
			'deaths'    => $deaths,
		]);
	}

	public function byCountry()
	{
		return view('landing-bycountry');
	}
}
