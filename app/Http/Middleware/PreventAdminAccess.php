<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreventAdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $user = Auth::user();

        // Check if the user is an admin or super_admin
        if ($user && in_array($user->role, ['admin', 'super_admin'])) {
            return redirect('/admin/dashboard')->withErrors(['error' => 'Admins cannot access user pages.']);
        }

        return $next($request); // Allow access for non-admin users
    }
}
