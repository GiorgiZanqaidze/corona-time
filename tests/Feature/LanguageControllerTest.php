<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class LanguageControllerTest extends TestCase
{
	public function test_it_switches_the_language()
	{
		$supportedLanguages = Config::get('languages');
		$lang = array_key_first($supportedLanguages);

		$response = $this->get(route('lang.switch', ['lang' => $lang]));

		$response->assertStatus(302);
		$response->assertRedirect();
		$this->assertEquals($lang, Session::get('applocale'));
	}
}
