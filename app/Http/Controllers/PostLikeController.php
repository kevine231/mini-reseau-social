<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(Post $post)
    {
        $user = auth()->user();
        
        // Vérifier si l'utilisateur a déjà liké ce post
        $existingLike = $post->likes()->where('user_id', $user->id)->first();
        
        if ($existingLike) {
            // Si l'utilisateur a déjà liké, on retire le like
            $existingLike->delete();
            $post->decrement('likes_count');
            $liked = false;
        } else {
            // Sinon, on ajoute un nouveau like
            $post->likes()->create(['user_id' => $user->id]);
            $post->increment('likes_count');
            $liked = true;
        }

        return response()->json([
            'likes_count' => $post->likes_count,
            'liked' => $liked
        ]);
    }
} 