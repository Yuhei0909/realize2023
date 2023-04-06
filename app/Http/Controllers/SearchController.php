<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = trim(htmlspecialchars($request->keyword));

        if (empty($keyword)) {
            return redirect()->back()->with('warning', 'キーワードを入力してください。');
        }

        $users  = User::where('nickname', 'like', "%{$keyword}%")->pluck('id')->all();
        $posts = Post::query()
        ->where('title', 'like', "%{$keyword}%")
        ->orWhere('content', 'like', "%{$keyword}%")
        ->orWhereIn('user_id', $users)
        ->get();
        return response()->view('posts.index', compact('posts'));
    }

    public function create()
    {
        return response()->view('search.input');
    }
}
