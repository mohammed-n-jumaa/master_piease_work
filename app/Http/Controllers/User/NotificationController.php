<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        Notification::create([
            'user_id' => auth()->id(),
            'message' => "Subject: " . $request->input('subject') . " | Message: " . $request->input('message'),
            'status' => 'unread',
        ]);

        return redirect()->back()->with('success', 'Your message has been successfully sent.');
    }
}
