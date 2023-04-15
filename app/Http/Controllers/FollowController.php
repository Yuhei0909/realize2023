<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
    
        $isMutualFollow = [];
        foreach ($users as $user) {
            $isMutualFollow[$user->id] = $this->isMutualFollow($user->id);
        }
    
        return view('user.index', compact('users', 'isMutualFollow'));
    }

    public function show($id)
    {
       $user = User::findOrFail($id);
        $followers = $user->followers;
        $followings = $user->followings;
        return view('user.show', compact('user', 'followers', 'followings'));
    }

    public function store(Request $request, $id)
    {
        $userToFollow = User::findOrFail($id);
        $request->user()->followings()->attach($userToFollow->id);

        return redirect()->back()->with('success', 'You are now following ' . $userToFollow->name);
    }

    public function destroy(Request $request, $id)
    {
        $userToUnfollow = User::findOrFail($id);
        $request->user()->followings()->detach($userToUnfollow->id);

        return redirect()->back()->with('success', 'You have unfollowed ' . $userToUnfollow->name);
    }

    public function isMutualFollow($id)
    {
        $user = User::findOrFail($id);
        $mutual_follows = Auth::user()->mutual_follows();
    
        return $mutual_follows->contains($user);
    }
}
