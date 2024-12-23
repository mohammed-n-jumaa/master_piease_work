<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PreventBackHistory
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
        $response = $next($request);

        if (!Auth::check()) {
            // منع التخزين المؤقت إذا لم يكن المستخدم أو المحامي مسجلاً الدخول
            return $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                            ->header('Pragma', 'no-cache')
                            ->header('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');
        }

        return $response;
    }
}
