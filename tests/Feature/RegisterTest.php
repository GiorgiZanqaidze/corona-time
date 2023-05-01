<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

	public function test_register_page_is_accessible()
	{
		$response = $this->get('/register');
		$response->assertSuccessful();
		$response->assertViewIs('register');
	}

	public function test_register_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post('/register');
		$response->assertSessionHasErrors(
			[
				'username',
				'email',
				'password',
				'password_confirmation',
			]
		);
	}

	public function test_auth_should_give_us_username_error_if_we_wont_provide_username_input()
	{
		$response = $this->post('/register', [
			'email'                 => 'example1@gmail.com',
			'password'              => 'secret-password',
			'password_confirmation' => 'secret-password',
		]);
		$response->assertSessionHasErrors(
			[
				'username',
			]
		);
		$response->assertSessionDoesntHaveErrors(['password', 'email', 'password_confirmation']);
	}

	public function test_auth_should_give_us_password_error_if_we_wont_provide_password_input()
	{
		$response = $this->post('/register', [
			'email'                       => 'example2@gmail.com',
			'username'                    => 'username1',
		]);

		$response->assertSessionHasErrors(
			[
				'password',
			]
		);

		$response->assertSessionDoesntHaveErrors(['email', 'username']);
	}

	public function test_auth_should_give_us_password_confirmation_error_if_we_wont_provide_password_confirmation_input()
	{
		$response = $this->post('/register', [
			'username'                       => 'username2',
			'email'                          => 'email3@gmail.com',
			'password'                       => 'secret-password',
		]);

		$response->assertSessionHasErrors(
			[
				'password_confirmation',
			]
		);

		$response->assertSessionDoesntHaveErrors(['password', 'username', 'email']);
	}

	public function test_auth_should_give_us_email_error_if_we_wont_provide_email_input()
	{
		$response = $this->post('/register', [
			'username'                                       => 'username3',
			'password'                                       => 'secret-password',
			'password_confirmation'                          => 'secret-password',
		]);

		$response->assertSessionHasErrors(
			[
				'email',
			]
		);
		$response->assertSessionDoesntHaveErrors(['password', 'username', 'password_confirmation']);
	}

	public function test_auth_should_give_us_email_and_username_error_if_we_wont_provide_email_and_username_input()
	{
		$response = $this->post('/register', [
			'password'                                       => 'secret-password',
			'password_confirmation'                          => 'secret-password',
		]);

		$response->assertSessionHasErrors(
			[
				'email',
				'username',
			]
		);
		$response->assertSessionDoesntHaveErrors(['password', 'password_confirmation']);
	}

	public function test_auth_should_give_us_email_and_password_error_if_we_wont_provide_email_and_password_input()
	{
		$response = $this->post('/register', [
			'username'                                       => 'username',
			'password_confirmation'                          => 'secret-password',
		]);

		$response->assertSessionHasErrors(
			[
				'email',
				'password',
			]
		);
		$response->assertSessionDoesntHaveErrors(['username']);
	}

	public function test_auth_should_give_us_email_and_password_confirmation_error_if_we_wont_provide_email_and_password_confirmation_input()
	{
		$response = $this->post('/register', [
			'username'                                       => 'username',
			'password'                                       => 'secret-password',
		]);

		$response->assertSessionHasErrors(
			[
				'email',
				'password_confirmation',
			]
		);
		$response->assertSessionDoesntHaveErrors(['username', 'password']);
	}

	public function test_auth_should_redirect_to_email_show_page_after_successful_registration()
	{
		$user = User::factory()->create();

		$response = $this->post('/register', [
			'email'                                 => fake()->unique()->safeEmail(),
			'username'                              => fake()->name(),
			'password'                              => $user->password,
			'password_confirmation'                 => $user->password,
		]);

		$response->assertRedirect('/show-email');
	}

	 public function test_it_verifies_a_user_account()
	 {
	 	$user = User::factory()->create([
	 		'email_verified' => 0,
	 		'remember_token' => Str::random(60),
	 	]);

	 	$response = $this->get("account/verify/{$user->remember_token}");

	 	$this->assertEquals(1, $user->fresh()->email_verified);
	 	$response->assertViewIs('confirmation-email');
	 }

	 public function test_it_redirects_to_login_if_token_is_invalid()
	 {
	 	$response = $this->get('account/verify/invalid-token');

	 	$response->assertRedirect(route('login'));
	 }
}
