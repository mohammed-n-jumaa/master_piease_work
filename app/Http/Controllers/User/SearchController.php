<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lawyer;

class SearchController extends Controller
{
    /**
     * تنفيذ البحث عن المستخدمين والمحامين.
     */
    public function search(Request $request)
    {
        try {
            $query = $request->input('query');

            if (!$query) {
                return response()->json([]);
            }

            // طباعة قيمة $query للتأكد من صحة البيانات المدخلة
            \Log::info('Search Query:', ['query' => $query]);

            // البحث عن المستخدمين
            $users = User::where('name', 'like', '%' . $query . '%')
                ->select('id', 'name', 'profile_picture')
                ->get();

            // طباعة بيانات المستخدمين
            \Log::info('Users Found:', $users->toArray());

            // البحث عن المحامين
            $lawyers = Lawyer::where('first_name', 'like', '%' . $query . '%')
                ->orWhere('last_name', 'like', '%' . $query . '%')
                ->select('id', 'first_name', 'last_name', 'profile_picture')
                ->get();

            // طباعة بيانات المحامين
            \Log::info('Lawyers Found:', $lawyers->toArray());

            // ضمان تحويل البيانات إلى Collection
            $usersCollection = collect($users);
            $lawyersCollection = collect($lawyers);

            // دمج نتائج البحث
            $results = $usersCollection->map(function ($user) {
                return [
                    'name' => $user->name,
                    'profile_picture' => $user->profile_picture
                        ? asset('storage/' . $user->profile_picture)
                        : 'https://ui-avatars.com/api/?name=' . urlencode($user->name),
                    'profile_url' => route('user.profile.show', ['id' => $user->id]),
                ];
            });

            $results = $results->merge($lawyersCollection->map(function ($lawyer) {
                return [
                    'name' => $lawyer->first_name . ' ' . $lawyer->last_name,
                    'profile_picture' => $lawyer->profile_picture
                        ? asset('storage/' . $lawyer->profile_picture)
                        : 'https://ui-avatars.com/api/?name=' . urlencode($lawyer->first_name . ' ' . $lawyer->last_name),
                    'profile_url' => route('lawyer.profile.show', ['id' => $lawyer->id]),
                ];
            }));

            return response()->json($results);
        } catch (\Exception $e) {
            // تسجيل رسالة الخطأ
            \Log::error('Search Error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json(['error' => 'An error occurred during the search.'], 500);
        }
    }
}
