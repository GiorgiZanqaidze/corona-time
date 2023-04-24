<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchDataCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:fetch-data-command';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Fetch data from API and store it in SQL database';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		$response = Http::get('https://devtest.ge/countries');
		$data = $response->json();

		foreach ($data as $country) {
			$detailResponse = Http::post('https://devtest.ge/get-country-statistics', [
				'code' => $country['code'],
			]);
			$detailData = $detailResponse->json();

			Country::create([
				'name' => [
					'en' => $country['name']['en'],
					'ka' => $country['name']['ka'],
				],
				'code'      => $country['code'],
				'confirmed' => $detailData['confirmed'],
				'recovered' => $detailData['recovered'],
				'deaths'    => $detailData['deaths'],
			]);
		}
	}
}
