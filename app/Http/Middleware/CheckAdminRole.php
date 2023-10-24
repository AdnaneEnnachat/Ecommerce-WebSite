<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the authenticated user is an admin and has the role of "superadmin" or "admin"
        if (Auth::guard('admin')->check() && (Auth::guard('admin')->user()->role === 'superadmin' && Auth::guard('admin')->user()->role !== 'admin')) {
            return $next($request);
        }

        // Redirect or return a response if the user does not have the required role
        return redirect()->back()->with('error', 'You are not authorized to access this resource.');
    }
}
