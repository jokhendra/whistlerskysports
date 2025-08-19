<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false,
        ]);

        Log::info('New user registered: ' . $user->email);

        Auth::login($user);

        // Handle redirect if provided
        $redirect = $request->input('redirect');
        if ($redirect) {
            return redirect($redirect);
        }

        return redirect()->route('home')
            ->with('success', 'Account created successfully!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Check if user exists and is active
        $user = User::where('email', $request->email)->first();
        if ($user && $user->status == 0) {
            return back()->withErrors([
                'email' => 'Your account has been disabled. Please contact support.'
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Update last login info
            $user = Auth::user();
            $user->last_login_at = now();
            $user->last_login_ip = $request->ip();
            $user->save();

            Log::info('User logged in: ' . $user->email . ' from ' . $user->last_login_ip);

            // Handle redirect if provided
            $redirect = $request->input('redirect');
            if ($redirect) {
                return redirect($redirect);
            }

            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Log::info('User logged out: ' . Auth::user()->email);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
} 