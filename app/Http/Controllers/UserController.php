<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Faker\Provider\UserAgent;
use App\Models\UserRememberToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function UserCreate(Request $request)
    {
        $payload = $request->validate([
            'first_name' => 'required|string|max:100|min:2',
            'last_name' => 'required|string|max:100|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:255|confirmed',
        ]);
        $payload['id'] = (string) Str::uuid();
        $payload['password'] = Hash::make($payload['password']);

        $user = User::create($payload);

        return response()->json([
            'message' => "User Successfully Created",
        ], 201);
    }

    public function UserLogin(Request $request)
    {
        $payload = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'remember' => 'nullable|boolean',
        ]);

        $remember = $payload['remember'] ?? false;

        // Fetch user by email
        $user = User::where('email', $payload['email'])->first();

        // Check if user exists and password is correct
        if ($user && Hash::check($payload['password'], $user->password)) {

            // Log the user in first so Auth::id() works
            Auth::login($user);

            // Save remember me token if selected
            if ($remember) {

                $token = Str::random(60);

                UserRememberToken::create([
                    'user_id'     => $user->id, // UUID should be correctly inserted here
                    'token'       => hash('sha256', $token),
                    'device_name' => $request->userAgent(),
                    'ip_address'  => $request->ip(),
                ]);

                // Store the raw token in a cookie (optional)
                Cookie::queue('remember_custom', $token, 60 * 24 * 30); // 30 days
            }

            // Regenerate session
            $request->session()->regenerate();

            return response()->json(['message' => 'Login successful']);
        }

        // Invalid credentials fallback
        return response()->json(['message' => 'Invalid Email or Password'], 401);
    }

    public function UserLogout(Request $request)
    {
        if ($request->hasCookie('remember_custom')) {
            $rawToken = $request->cookie('remember_custom');

            UserRememberToken::where('token', hash('sha256', $rawToken))->delete();

            Cookie::queue(Cookie::forget('remember_custom'));
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logged out successfully.');
    }
}
