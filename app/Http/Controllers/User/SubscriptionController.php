<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function show()
    {
        return view('user.subscription');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan' => 'required|in:monthly,semiannual,annual',
        ]);

        $lawyer = Auth::guard('lawyer')->user();

        // تحديد تاريخ انتهاء الاشتراك بناءً على الخطة
        $endDate = match ($request->plan) {
            'monthly' => now()->addMonth(),
            'semiannual' => now()->addMonths(6),
            'annual' => now()->addYear(),
        };

        Subscription::create([
            'lawyer_id' => $lawyer->id,
            'plan' => $request->plan,
            'start_date' => now(),
            'end_date' => $endDate,
            'price' => $request->plan === 'monthly' ? 5 : ($request->plan === 'semiannual' ? 25 : 50),
        ]);

        return redirect()->route('lawyer.profile')->with('success', 'Subscription activated successfully!');
    }
}
