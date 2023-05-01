<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;

class ResetUserPasswordTest extends TestCase
{
	use RefreshDatabase, WithFaker;

	public function test_it_sends_password_reset_email(): void
	{
		Mail::fake();

		$user = User::factory()->create();

		$response = $this->post('/reset-password', [
			'email' => $user->email,
		]);

		$response->assertRedirect('/show-email');

		Mail::assertSent(Mailer::class);

		$response->assertSessionHas('success', 'Great! You have Successfully loggedin');
	}

	public function test_it_does_not_send_email_for_non_existent_user(): void
	{
		Mail::fake();

		$response = $this->post('/reset-password', [
			'email' => 'invalid-email@example.com',
		]);

		$response->assertRedirect('/reset-password');
		$response->assertSessionHas('success', 'There is no user related to this email');

		Mail::assertNothingSent();
	}

	public function test_it_displays_set_new_password_page(): void
	{
		$user = User::factory()->create();

		$response = $this->get('/account/verify/password/' . $user->remember_token);

		$response->assertViewIs('set-new-password');
		$response->assertViewHas('token', $user->remember_token);
	}

	public function test_it_updates_user_password(): void
	{
		$user = User::factory()->create();
		$token = $user->remember_token;
		$newPassword = $this->faker->password;

		$response = $this->patch('/account/verify/password/' . $token, [
			'password'              => $newPassword,
			'password_confirmation' => $newPassword,
		]);

		$response->assertRedirect('/confirmation-password');

		$user->refresh();
		$this->assertTrue(password_verify($newPassword, $user->password));
	}

	public function test_it_returns_error_for_invalid_token(): void
	{
		$response = $this->post('/reset-password/invalid-token', [
			'password'              => $this->faker->password,
			'password_confirmation' => $this->faker->password,
		]);

		$response->assertStatus(404);
	}
}
