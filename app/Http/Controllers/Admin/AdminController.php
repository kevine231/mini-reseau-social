<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();
        $groupCount = Group::count();
        $recentUsers = User::latest()->take(5)->get();
        $unreadContactCount = ContactForm::where('read', false)->count();

        return response()->json([
            'user_count' => $userCount,
            'group_count' => $groupCount,
            'recent_users' => $recentUsers,
            'unread_contact_count' => $unreadContactCount
        ]);
    }
}
