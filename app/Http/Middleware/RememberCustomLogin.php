<?php

namespace App\Http\Middleware;

use App\Models\UserRememberToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RememberCustomLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            $rawToken = $request->cookie('remember_custom');

            if ($rawToken) {
                $hashedToken = hash('sha256', $rawToken);

                $tokenRecord = UserRememberToken::where('token', $hashedToken)->first();

                if ($tokenRecord && $tokenRecord->user) {
                    Auth::login($tokenRecord->user);
                }
            }
        }
        return $next($request);
    }
}
