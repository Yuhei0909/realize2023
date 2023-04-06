<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        $like = new Like();
        $like->user_id = Auth::id();
        $like->post_id = $post->id;
        $like->save();

        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        $like = Like::where('post_id', $post->id)
                    ->where('user_id', Auth::id())
                    ->first();
        $like->delete();

        return redirect()->back();
    }
}
