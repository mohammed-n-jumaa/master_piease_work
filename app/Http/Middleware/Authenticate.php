<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($request->is('user/*')) {
            return route('user.lawyer.login.form'); // إعادة التوجيه إلى صفحة تسجيل دخول المستخدمين والمحامين
        }
    
        if ($request->is('admin/*')) {
            return route('admin.login'); // إعادة التوجيه إلى صفحة تسجيل دخول الأدمن
        }
    
        return route('user.lawyer.login.form');
    }
    
}
