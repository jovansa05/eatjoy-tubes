<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        // Debug: Cek apakah user ada di database
        $user = User::where('username', $request->username)->first();

        if ($user) {
            // Debug: Cek password
            if (Hash::check($request->password, $user->password)) {
                if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                    $request->session()->regenerate();
                    $request->session()->put('first_login', true);

                    // Redirect berdasarkan subscription plan
                    if ($user->subscription_plan === 'starter') {
                        return redirect()->route('dashboard.premium.starter');
                    } elseif ($user->subscription_plan === 'starter_plus') {
                        return redirect()->route('dashboard.premium.starter.plus');
                    } else {
                        return redirect()->route('dashboard.user');
                    }
                }
            } else {
                Log::info('Password mismatch for user: ' . $request->username);
            }
        } else {
            Log::info('User not found: ' . $request->username);
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Debug log
        Log::info('Registration attempt:', $request->all());

        $request->validate([
            'nickname' => 'required|string|max:50',
            'username' => 'required|string|unique:users|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'current_weight' => 'required|numeric|min:30|max:300',
            'target_weight' => 'required|numeric|min:30|max:300',
        ]);

        try {
            $user = User::create([
                'nickname' => $request->nickname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Pastikan di-hash
                'current_weight' => $request->current_weight,
                'target_weight' => $request->target_weight,
                'subscription_plan' => 'free', // Default free
            ]);

            Log::info('User created successfully:', ['user_id' => $user->id]);

            Auth::login($user);
            $request->session()->regenerate();

            // Set session untuk first login
            $request->session()->put('first_login', true);

            // Redirect ke subscription plans page
            return redirect()->route('subscription.plans')->with('success', 'Registrasi berhasil! Silakan pilih paket langganan.');


        } catch (\Exception $e) {
            Log::error('Registration error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat registrasi. Silakan coba lagi.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
