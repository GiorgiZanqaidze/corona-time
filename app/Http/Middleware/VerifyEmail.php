<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmail
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next)
	{
		if (!Auth::user()->email_verified) {
			auth()->logout();
			return redirect()->route('home')
					->with('message', 'You need to confirm your account. We have sent you an activation code, please check your email.');
		}

		return $next($request);
	}
}