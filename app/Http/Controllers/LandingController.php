<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\View\View;

class LandingController extends Controller
{
	public function worldwide(): View
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

	public function byCountry(): View
	{
		return view('landing-bycountry');
	}
}
