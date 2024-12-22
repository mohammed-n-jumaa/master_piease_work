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
        // إذا كان المستخدم يحاول الوصول إلى صفحات "المستخدم والمحامي"
        if ($request->is('user/*')) {
            return route('user.lawyer.login.form'); // إعادة التوجيه إلى صفحة تسجيل دخول المستخدم والمحامي
        }

        // إذا كان المستخدم يحاول الوصول إلى صفحات "الأدمن"
        if ($request->is('admin/*')) {
            return route('admin.login'); // إعادة التوجيه إلى صفحة تسجيل دخول الأدمن
        }

        // الإعداد الافتراضي
        return route('user.lawyer.login.form');
    }
}
