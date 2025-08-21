<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->throttle($request);
        
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Login dengan nama session khusus untuk admin
        $request->session()->put('login_type', 'admin');
        
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);

            $role = Auth::user()->role;
            if ($role === 'user') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->withErrors([
                    'email' => 'Anda tidak memiliki akses admin.'
                ])->onlyInput('email');
            }

            return redirect()->intended(route('admin.dashboard'));
        }

        $this->incrementLoginAttempts($request);

        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ])->onlyInput('email');
    }

    // Method throttle yang sama seperti sebelumnya
    protected function throttle(Request $request)
    {
        $key = $this->throttleKey($request);
        $maxAttempts = 5;
        $decayMinutes = 15;

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);
            
            throw ValidationException::withMessages([
                'email' => [
                    'Terlalu banyak percobaan login. Silakan coba lagi dalam ' .
                     gmdate('i:s', $seconds) . ' menit.'
                ]
            ]);
        }
    }

    protected function incrementLoginAttempts(Request $request)
    {
        RateLimiter::hit($this->throttleKey($request), 15 * 60);
    }

    protected function clearLoginAttempts(Request $request)
    {
        RateLimiter::clear($this->throttleKey($request));
    }

    protected function throttleKey(Request $request)
    {
        return 'admin_login:' . strtolower($request->input('email')) . '|' . $request->ip();
    }

    public function logout(Request $request)
    {
        // Pastikan logout hanya untuk admin
        if (session('login_type') === 'admin') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route('login');
    }
}