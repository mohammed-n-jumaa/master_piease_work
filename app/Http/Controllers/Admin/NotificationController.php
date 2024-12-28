<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
{
    // جلب الإشعارات مع بيانات المستخدمين والمحامين
    $notifications = Notification::with(['user', 'lawyer'])->latest()->get();

    // تمرير البيانات إلى صفحة العرض
    return view('admin.notifications.manage-notifications', compact('notifications'));
}

}
