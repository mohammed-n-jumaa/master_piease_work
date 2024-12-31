<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;
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
    public function processPayment(Request $request)
    {
        // تحقق من صحة التوكن
        $request->validate([
            'plan' => 'required|in:monthly,semiannual,annual',
            'stripeToken' => 'required',
        ]);

        $lawyer = Auth::guard('lawyer')->user();
        
        // إعداد Stripe
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            // محاولة إنشاء الدفع باستخدام Stripe
            $charge = Charge::create([
                'amount' => $this->getPriceForPlan($request->plan), // تأكد من القيمة المناسبة للمبلغ
                'currency' => 'usd', // يمكنك تغيير العملة حسب الحاجة
                'description' => 'Lawyer subscription for plan: ' . $request->plan,
                'source' => $request->stripeToken,
            ]);
            
            // إنشاء اشتراك في قاعدة البيانات
            Subscription::create([
                'lawyer_id' => $lawyer->id,
                'plan' => $request->plan,
                'start_date' => now(),
                'end_date' => $this->getEndDateForPlan($request->plan),
                'price' => $charge->amount / 100, // Stripe يعيد المبلغ بالمليم
            ]);

            return redirect()->route('lawyer.profile')->with('success', 'Subscription activated successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Payment failed: ' . $e->getMessage()]);
        }
    }

    // تابع للحصول على المبلغ بناءً على الخطة
    protected function getPriceForPlan($plan)
    {
        switch ($plan) {
            case 'monthly':
                return 500; // 5 دولارات
            case 'semiannual':
                return 2500; // 25 دولارًا
            case 'annual':
                return 5000; // 50 دولارًا
            default:
                return 0;
        }
    }

    // تابع لحساب تاريخ انتهاء الاشتراك بناءً على الخطة
    protected function getEndDateForPlan($plan)
    {
        switch ($plan) {
            case 'monthly':
                return now()->addMonth();
            case 'semiannual':
                return now()->addMonths(6);
            case 'annual':
                return now()->addYear();
            default:
                return now();
        }
    }
}
