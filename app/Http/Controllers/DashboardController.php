<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
	public function worldwide()
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

		return redirect('/')->withErrors('Opps! You do not have access');
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

		if (Auth::check()) {
			return view('landing-bycountry', [
				'allCountry' => $country,
				'confirmed'  => $confirmed,
				'recovered'  => $recovered,
				'deaths'     => $deaths,
			]);
		}

		return redirect('/')->withErrors('Opps! You do not have access');
	}
}
