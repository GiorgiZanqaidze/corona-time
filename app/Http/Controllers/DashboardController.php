<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
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

	public function byCountry(Request $request): View
	{
		$searchQuery = $request->query('sort_by');
		// $sort_by = request()->input('sort_by', 'name');
		if (request('search') || request('sort_by')) {
			dd($searchQuery);
			$country = Country::where('name', 'like', '%' . request('search') . '%')
			->orWhere()
			->get();
			$country->orderBy(request('sort_by', 'asc'))->get();
		// dd($sort_by);
		// $country = Country::orderBy($sort_by, 'asc')->get();
		} else {
			$country = Country::all();
		}

		if (Auth::check()) {
			return view('landing-bycountry', ['allCountry' => $country]);
		}

		return redirect('/')->withSuccess('Opps! You do not have access');
	}
}
