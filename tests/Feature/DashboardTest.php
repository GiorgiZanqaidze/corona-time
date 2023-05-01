<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
	}

	public function test_redirect_to_login_page_if_not_authorized_on_visiting_landing_worldwide_page()
	{
		$response = $this->get('/landing-worldwide');
		$response->assertStatus(302);
		$response->assertRedirect('/');
	}

	public function test_redirect_to_login_page_if_not_authorized_on_visiting_landing_bycountry_page()
	{
		$response = $this->get('/landing-bycountry');
		$response->assertStatus(302);
		$response->assertRedirect('/');
	}

	public function test_visit_landing_worldwide_page_successfully()
	{
		$response = $this->actingAs($this->user)->get('/landing-worldwide');
		$response->assertViewIs('landing-worldwide');
		$response->assertViewHas(['confirmed', 'recovered', 'deaths']);
		$response->assertSuccessful();
	}

	public function test_visit_landing_bucountry_page_successfully()
	{
		$response = $this->actingAs($this->user)->get('/landing-bycountry');
		$response->assertViewIs('landing-bycountry');
		$response->assertViewHas(['allCountry', 'confirmed', 'recovered', 'deaths']);
		$response->assertSuccessful();
	}
}
