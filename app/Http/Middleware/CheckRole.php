<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek dari guard admin atau web
        $user = Auth::guard('admin')->user() ?? Auth::guard('web')->user() ?? $request->user();
        
        if ($user && in_array($user->role, $roles, true)) {
            return $next($request);
        }
        
        // Redirect ke login yang sesuai
        if (in_array('admin', $roles)) {
            return redirect()->route('login')->withErrors([
                'access' => 'Anda tidak memiliki izin mengakses halaman admin.'
            ]);
        }
        
        if (in_array('user', $roles)) {
            return redirect()->route('user.login')->withErrors([
                'access' => 'Anda tidak memiliki izin mengakses halaman ini.'
            ]);
        }
        
        abort(403, 'Anda tidak memiliki izin mengakses halaman ini.');
    }
}