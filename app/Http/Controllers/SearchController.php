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
  
    // セッションに検索キーワードを保存
    $search_history = $request->session()->get('search_history', []);
    array_unshift($search_history, $keyword);
    $search_history = array_slice(array_unique($search_history), 0, 5);
    $request->session()->put('search_history', $search_history);
  
    return response()->view('search.input', compact('posts', 'keyword'));
  }

    public function create()
    {
        return response()->view('search.input');
    }
}
