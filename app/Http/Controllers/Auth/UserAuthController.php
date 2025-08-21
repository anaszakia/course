<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
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

        $throttleKey = 'user_login:' . strtolower($request->input('email')).'|'.$request->ip();
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            return back()->withErrors([
                'email' => 'Terlalu banyak percobaan login. Silakan coba lagi dalam '.ceil($seconds/60).' menit.'
            ]);
        }

        // Set session type untuk user
        $request->session()->put('login_type', 'user');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role !== 'user') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->withErrors([
                    'email' => 'Anda tidak memiliki akses user.'
                ])->onlyInput('email');
            }
            
            RateLimiter::clear($throttleKey);
            $request->session()->regenerate();
            
            session()->flash('login_success', true);
            session()->flash('user_name', Auth::user()->name);
            
            return redirect()->intended('/');
        }

        RateLimiter::hit($throttleKey, 900);

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

        return redirect()->route('user.login')
            ->with('registration_success', true)
            ->with('registered_name', $user->name);
    }

    public function logout(Request $request)
    {
        $userName = Auth::user()->name ?? '';
        
        // Pastikan logout hanya untuk user
        if (session('login_type') === 'user') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        
        session()->flash('logout_success', true);
        session()->flash('logged_out_user', $userName);
        
        return redirect('/');
    }
}