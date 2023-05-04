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

		$name = request('search');
		$sort = request('sort_by');
		if (request('search')) {
			$country = Country::where('name', 'like', '%' . $name . '%')->orderBy('name')->get();
		} elseif (request('sort_by')) {
			$country = Country::orderBy($sort)
			->get();
		} elseif (request('sort_by')) {
			$country = Country::where('name', 'like', '%' . $name . '%')
			->orderBy($sort)
			->get();
		} else {
			$country = Country::all();
		}

		return view('landing-bycountry', [
			'allCountry' => $country,
			'confirmed'  => $confirmed,
			'recovered'  => $recovered,
			'deaths'     => $deaths,
		]);
	}
}
