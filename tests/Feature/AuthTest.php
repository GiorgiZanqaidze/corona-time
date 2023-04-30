<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	public function test_login_page_is_accessible()
	{
		$response = $this->get('/');
		$response->assertSuccessful();
		$response->assertSee('Welcome Back');
		$response->assertViewIs('login');
	}

	public function test_auth_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post('/post-login');
		$response->assertSessionHasErrors(
			[
				'username',
				'password',
			]
		);
	}

	public function test_auth_should_give_us_username_error_if_we_wont_provide_username_input()
	{
		$response = $this->post('/post-login', [
			'password' => 'secret-password',
		]);
		$response->assertSessionHasErrors(
			[
				'username',
			]
		);
		$response->assertSessionDoesntHaveErrors(['password']);
	}

	public function test_auth_should_give_us_password_error_if_we_wont_provide_password_input()
	{
		$response = $this->post('/post-login', [
			'username' => 'username',
		]);
		$response->assertSessionHasErrors(
			[
				'password',
			]
		);
		$response->assertSessionDoesntHaveErrors(['username']);
	}

	public function test_auth_should_give_us_incorrect_credentials_error_when_such_user_does_not_exist()
	{
		$response = $this->post('/post-login', [
			'username' => 'username',
			'password' => 'password',
		]);

		$response->assertSessionHasErrors([
			'username' => 'Please provide correct credentials',
		]);
	}

	public function test_auth_should_redirect_to_worldwide_statistics_page_after_successful_login()
	{
		$username = 'username';
		$password = 'password';
		$email = 'email@gmail.com';

		User::factory()->create(
			[
				'username'                 => $username,
				'email'                    => $email,
				'password'                 => bcrypt($password),
			]
		);

		$response = $this->post('/post-login', [
			'username'                 => $username,
			'password'                 => $password,
		]);

		$response->assertRedirect('/landing-worldwide');
	}

	public function test_when_user_is_not_logged_in_Dont_let_him_to_the_logout_route()
	{
		$this->post('/logout')->assertRedirect('/');
	}

	public function test_user_can_successfully_logout()
	{
		$user = User::factory()->create();
		$this->actingAs($user)->post('/logout')->assertRedirect('/');
	}
}
