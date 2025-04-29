<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next, $type = 'frontend')
    {
        if (!Auth::check()) {
            if ($type == 'frontend') {
                return redirect()->route('frontend.login.form');
            } elseif ($type == 'backend') {
                return redirect()->route('backend.login.form');
            }
        }
        return $next($request);
    }
}
