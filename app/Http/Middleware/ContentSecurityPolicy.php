<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ContentSecurityPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        
        // Tambahkan domain Midtrans ke Content Security Policy
        $response->header('Content-Security-Policy', "
            default-src 'self';
            script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net https://cdn.tailwindcss.com https://cdnjs.cloudflare.com https://app.sandbox.midtrans.com https://app.midtrans.com;
            style-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com https://cdnjs.cloudflare.com https://fonts.bunny.net;
            font-src 'self' https://fonts.bunny.net;
            img-src 'self' data: https:;
            connect-src 'self' wss: https: http:;
            frame-src 'self' https://app.sandbox.midtrans.com https://app.midtrans.com;
        ");

        return $response;
    }
}
