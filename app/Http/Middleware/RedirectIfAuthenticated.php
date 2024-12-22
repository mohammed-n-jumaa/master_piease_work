<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$guards): mixed
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();

                // إذا كان المسؤول
                if ($user->role === 'admin' || $user->role === 'super_admin') {
                    return redirect('/admin/dashboard');
                }

                // إذا كان المستخدم أو المحامي
                if ($user->role === 'user' || $user->role === 'lawyer') {
                    return redirect('/user/home');
                }
            }
        }

        return $next($request);
    }
}
