<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Post;
use Auth;
use App\Models\User;
use App\Models\Conversation;

class ConversationController extends Controller
{
public function index(Request $request, $user_id)
{
    $selected_user = User::findOrFail($user_id);
    $auth_user = auth()->user();
    $conversations = Conversation::where(function($query) use ($auth_user, $selected_user) {
        $query->where('from_user_id', $auth_user->id)
            ->where('to_user_id', $selected_user->id);
    })->orWhere(function($query) use ($auth_user, $selected_user) {
        $query->where('from_user_id', $selected_user->id)
            ->where('to_user_id', $auth_user->id);
    })->orderBy('created_at', 'asc')->get();

    $mutual_follows = $this->getMutualFollows($auth_user);

    return view('conversations.index', compact('conversations', 'mutual_follows', 'selected_user'));
}

    public function store(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $auth_user = auth()->user();

        $this->validate($request, [
            'content' => 'required|max:255',
        ]);

        $conversation = new Conversation([
            'from_user_id' => $auth_user->id,
            'to_user_id' => $user->id,
            'content' => $request->content,
        ]);

        $conversation->save();

        return redirect()->route('conversations.index', $user->id);
    }

    public function getMutualFollowConversations(Request $request)
    {
        $auth_user = Auth::user();
        $mutual_follows = $auth_user->followings->intersect($auth_user->followers);

        $conversations = collect();
        foreach ($mutual_follows as $mutual_follow) {
            $conversation = Conversation::where(function ($query) use ($auth_user, $mutual_follow) {
                $query->where('from_user_id', $auth_user->id)
                      ->where('to_user_id', $mutual_follow->id);
            })->orWhere(function ($query) use ($auth_user, $mutual_follow) {
                $query->where('from_user_id', $mutual_follow->id)
                      ->where('to_user_id', $auth_user->id);
            })->get();

            $conversations = $conversations->concat($conversation);
        }

        return view('conversations.index', [
            'conversations' => $conversations,
            'user' => $auth_user,
            'mutual_follows' => $mutual_follows
        ]);
    }
    
    private function getMutualFollows($user)
    {
        return $user->followings->intersect($user->followers);
    }
}
