<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
	public function worldwide(): View
	{
		if (Auth::check()) {
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

		return redirect('/')->withSuccess('Opps! You do not have access');
	}

	public function byCountry(): View
	{
		$countryData = Country::all();
		if (Auth::check()) {
			return view('landing-bycountry', ['allCountry' => $countryData]);
		}

		return redirect('/')->withSuccess('Opps! You do not have access');
	}
}
