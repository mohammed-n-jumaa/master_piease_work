<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $selectedMonth = $request->get('month', Carbon::now()->month);
        $selectedYear = $request->get('year', Carbon::now()->year);

        $totalConsultations = DB::table('consultations')
            ->whereMonth('created_at', '=', $selectedMonth)
            ->whereYear('created_at', '=', $selectedYear)
            ->count();

        $totalLawyers = DB::table('lawyers')
            ->whereMonth('created_at', '=', $selectedMonth)
            ->whereYear('created_at', '=', $selectedYear)
            ->count();

        $activeSubscriptions = DB::table('subscriptions')
            ->where('end_date', '>=', now())
            ->whereMonth('created_at', '=', $selectedMonth)
            ->whereYear('created_at', '=', $selectedYear)
            ->count();

        $activeSubscriptionsPrice = DB::table('subscriptions')
            ->where('end_date', '>=', now())
            ->whereMonth('created_at', '=', $selectedMonth)
            ->whereYear('created_at', '=', $selectedYear)
            ->sum('price');

        
        $expiredSubscriptions = DB::table('subscriptions')
            ->where('end_date', '<', now())
            ->whereMonth('created_at', '=', $selectedMonth)
            ->whereYear('created_at', '=', $selectedYear)
            ->count();

        $expiredSubscriptionsPrice = DB::table('subscriptions')
            ->where('end_date', '<', now())
            ->whereMonth('created_at', '=', $selectedMonth)
            ->whereYear('created_at', '=', $selectedYear)
            ->sum('price');

        
        $totalSubscriptions = DB::table('subscriptions')
            ->selectRaw('COUNT(*) as total_count, SUM(price) as total_price')
            ->whereMonth('created_at', '=', $selectedMonth)
            ->whereYear('created_at', '=', $selectedYear)
            ->first();

        
        $totalClients = DB::table('users')
            ->where('role', 'user')
            ->whereMonth('created_at', '=', $selectedMonth)
            ->whereYear('created_at', '=', $selectedYear)
            ->count();

       
        $subscriptionsMonthlyData = DB::table('subscriptions')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month');

       
        $lawyersMonthlyData = DB::table('lawyers')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month');

        
        return view('admin.index', [
            'user' => Auth::user(),
            'totalConsultations' => $totalConsultations,
            'totalLawyers' => $totalLawyers,
            'activeSubscriptions' => $activeSubscriptions,
            'activeSubscriptionsPrice' => $activeSubscriptionsPrice,
            'expiredSubscriptions' => $expiredSubscriptions,
            'expiredSubscriptionsPrice' => $expiredSubscriptionsPrice,
            'totalSubscriptions' => $totalSubscriptions,
            'totalClients' => $totalClients,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
            'subscriptionsMonthlyData' => $subscriptionsMonthlyData,
            'lawyersMonthlyData' => $lawyersMonthlyData,
        ]);
    }
}
