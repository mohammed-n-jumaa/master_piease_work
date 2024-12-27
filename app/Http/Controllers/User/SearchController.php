<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lawyer;

class SearchController extends Controller
{
   
    public function search(Request $request)
    {
        try {
            $query = $request->input('query');

            if (!$query) {
                return response()->json([]);
            }

            \Log::info('Search Query:', ['query' => $query]);

            // search for users 
            $users = User::where('name', 'like', '%' . $query . '%')
                ->select('id', 'name', 'profile_picture')
                ->get();

            // print users information
            \Log::info('Users Found:', $users->toArray());

            // search for lawyers
            $lawyers = Lawyer::where('first_name', 'like', '%' . $query . '%')
                ->orWhere('last_name', 'like', '%' . $query . '%')
                ->select('id', 'first_name', 'last_name', 'profile_picture')
                ->get();

            // print lawyers information
            \Log::info('Lawyers Found:', $lawyers->toArray());

            $usersCollection = collect($users);
            $lawyersCollection = collect($lawyers);

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

            \Log::error('Search Error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json(['error' => 'An error occurred during the search.'], 500);
        }
    }
}
