<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrLawyerOnly
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
        // التحقق من المستخدم
        if (Auth::guard('web')->check()) {
            return $next($request);
        }

        // التحقق من المحامي
        if (Auth::guard('lawyer')->check()) {
            return $next($request);
        }

        // إذا لم يكن مسجل الدخول كـ user أو lawyer
        return redirect('/user-lawyer/login')->withErrors([
            'access' => 'You do not have permission to access this page.',
        ]);
    }
}
