<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Cek apakah user sudah login dan memiliki role yang sesuai
        if (!Auth::check() || !in_array(Auth::user()->role, ['admin', 'super_admin'])) {
            return redirect('/home')->with('error', 'You do not have access to this page.');
        }
    
        return $next($request);
    }
}