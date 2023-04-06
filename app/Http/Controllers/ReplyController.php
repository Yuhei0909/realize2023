<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);

        $reply = new Reply();
        $reply->content = $request->content;
        $reply->user_id = $request->user()->id;
        $reply->post_id = $postId;
        $reply->save();

        return redirect()->back()->with('success', 'Reply successfully posted.');
    }

    public function destroy(Request $request, $id)
    {
        $reply = Reply::findOrFail($id);

        if ($request->user()->id != $reply->user_id) {
            return redirect()->back()->with('error', 'You do not have permission to delete this reply.');
        }

        $reply->delete();

        return redirect()->back()->with('success', 'Reply successfully deleted.');
    }
}
