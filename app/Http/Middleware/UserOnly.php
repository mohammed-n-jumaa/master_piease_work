<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserOnly
{
    public function handle(Request $request, Closure $next)
    {
        // تحقق من أن المستخدم يستخدم جارد 'user'
        if (!auth()->guard('web')->check()) {
            // عرض خطأ 404 إذا لم يكن المستخدم
            throw new NotFoundHttpException();
        }

        return $next($request);
    }
}
