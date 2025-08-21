<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('welcome.login.login');
    }

    public function showRegisterForm()
    {
        return view('welcome.login.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Throttle: max 5 attempts per 15 minutes per email+ip
        $throttleKey = strtolower($request->input('email')).'|'.$request->ip();
        if (\Illuminate\Support\Facades\RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = \Illuminate\Support\Facades\RateLimiter::availableIn($throttleKey);
            return back()->withErrors([
                'email' => 'Terlalu banyak percobaan login. Silakan coba lagi dalam '.ceil($seconds/60).' menit.'
            ]);
        }

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role !== 'user') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->withErrors([
                    'email' => 'Anda tidak memiliki akses.'
                ])->onlyInput('email');
            }
            
            \Illuminate\Support\Facades\RateLimiter::clear($throttleKey);
            $request->session()->regenerate();
            
            // Set session flash messages for SweetAlert
            session()->flash('login_success', true);
            session()->flash('user_name', Auth::user()->name);
            
            return redirect()->intended('/');
        }

        \Illuminate\Support\Facades\RateLimiter::hit($throttleKey, 900); // 900 detik = 15 menit

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        // Set session flash message for successful registration
        return redirect()->route('user.login')
            ->with('registration_success', true)
            ->with('registered_name', $user->name);
    }

    public function logout(Request $request)
    {
        // Get user name before logout for the success message
        $userName = Auth::user()->name ?? '';
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Set session flash messages for SweetAlert
        session()->flash('logout_success', true);
        session()->flash('logged_out_user', $userName);
        
        return redirect('/');
    }
}