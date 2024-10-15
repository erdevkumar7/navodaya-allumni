<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotOrg
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('org')->check()) {
            return $next($request);
        }

        return redirect()->route('org.loginForm')->with('error', 'Please log in to access the organizer dashboard.');
    }
}

