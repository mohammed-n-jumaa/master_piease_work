<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;

class CheckLawyerSubscription
{
    public function handle(Request $request, Closure $next)
    {
        $lawyer = Auth::guard('lawyer')->user();

        // التحقق من وجود اشتراك نشط
        if ($lawyer) {
            $subscription = Subscription::where('lawyer_id', $lawyer->id)
                ->where('end_date', '>=', now())
                ->first();

            if (!$subscription) {
                return redirect()->route('lawyer.subscription')
                    ->with('error', 'You need an active subscription to access the platform.');
            }
        }

        return $next($request);
    }
}
