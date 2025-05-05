<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Group;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Récupérer les données pour le dashboard
        $suggestedGroups = Group::withCount('members')
            ->latest()
            ->take(3)
            ->get()
            ->map(function ($group) {
                return [
                    'id' => $group->id,
                    'name' => $group->name,
                    'icon' => $group->icon ?? '👥',
                    'members' => $group->members_count
                ];
            });

        $posts = Post::with('user')
            ->latest()
            ->take(10)
            ->get()
            ->map(function ($post) {
                return [
                    'id' => $post->id,
                    'user' => [
                        'name' => $post->user->name,
                        'avatar' => $post->user->avatar
                    ],
                    'content' => $post->content,
                    'time' => $post->created_at->diffForHumans(),
                    'likes' => $post->likes_count,
                    'comments' => $post->comments_count,
                    'image' => $post->image
                ];
            });

        return Inertia::render('User/Dashboard', [
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar
            ],
            'suggestedGroups' => $suggestedGroups,
            'posts' => $posts
        ]);
    }
}
