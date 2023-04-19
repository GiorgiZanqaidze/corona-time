<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
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
			DB::table('countries')->insert([
				'code'       => $country['code'],
				'name'       => json_encode($country['name']),
			]);
		}
	}
}
