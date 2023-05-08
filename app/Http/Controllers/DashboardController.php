<?php

namespace App\Http\Controllers;

use App\Models\Country;

class DashboardController extends Controller
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
		$countryData = Country::all();
		$confirmed = $countryData->sum('confirmed');
		$recovered = $countryData->sum('recovered');
		$deaths = $countryData->sum('deaths');

		$country = Country::all();

		if (request('search')) {
			$country = Country::where('name->en', 'like', '%' . request('search') . '%')
			->orWhere('name->ka', 'like', '%' . request('search') . '%')->get();
		}

		if (request('sort_by')) {
			$country = Country::orderBy(request('sort_by'), 'asc')->get();
		}

		if (request('search') && request('sort_by')) {
			$country = Country::where('name->en', 'like', '%' . request('search') . '%')
			->orWhere('name->ka', 'like', '%' . request('search') . '%')->orderBy(request('sort_by'), 'asc')->get();
		}

		return view('landing-bycountry', [
			'allCountry' => $country,
			'confirmed'  => $confirmed,
			'recovered'  => $recovered,
			'deaths'     => $deaths,
		]);
	}
}
