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
    public function handle(Request $request, Closure $next)
    {
        // تحقق إذا كان المستخدم مسجل كـ "أدمن" أو "سوبر أدمن"
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard')->with('error', 'Admins are not allowed to access user pages.');
        }

        // السماح للمحامين والمستخدمين العاديين
        return $next($request);
    }
}
