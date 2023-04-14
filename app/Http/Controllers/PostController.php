<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Post;
use Auth;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::getAllOrderByUpdated_at();
        return response()->view('posts.index',compact('posts'));
    }

    public function create()
    {
        return response()->view('posts.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required | max:40',
            'content' => 'required',
    ]);
    if ($validator->fails()) {
        return redirect()
        ->route('posts.create')
        ->withInput()
        ->withErrors($validator);
    }

        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        $result = Post::create($data);
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $replies = $post->replies()->with('user')->latest()->get();
        $reply_type = $post->reply_type;
        return view('posts.show', compact('post', 'replies', 'reply_type'));
    }


    public function edit($id)
    {
        $post = Post::find($id);
        return response()->view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required | max:191',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('posts.edit', $id)
                ->withInput()
                ->withErrors($validator);
        }
        $result = Post::find($id)->update($request->all());
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $result = Post::find($id)->delete();
        return redirect()->route('posts.index');
    }
    
    public function mydata()
    {
        $posts = Auth::user()
            ->posts()
            ->orderBy('created_at','desc')
            ->get();
        return response()->view('posts.mydata', compact('posts'));
    }
    
    public function timeline()
    {
        $followings = User::find(Auth::id())->followings->pluck('id')->all();
        $posts = Post::query()
            ->where('user_id', Auth::id())
            ->orWhereIn('user_id', $followings)
            ->orderBy('updated_at', 'desc')
            ->get();
        return response()->view('posts.index', compact('posts'));
    }
}
