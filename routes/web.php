<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/posts/search/input', [SearchController::class, 'create'])->name('search.input');
    Route::get('/posts/search/result', [SearchController::class, 'index'])->name('search.result');
    Route::get('/posts/mypage', [PostController::class, 'mydata'])->name('posts.mypage');
    Route::get('/posts/timeline', [PostController::class, 'timeline'])->name('posts.timeline');
    Route::resource('posts', PostController::class);
    Route::get('/user', [FollowController::class, 'index'])->name('user.index');
    Route::get('user/{user}', [FollowController::class, 'show'])->name('user.show');
    Route::post('user/{user}/follow', [FollowController::class, 'store'])->name('follow');
    Route::post('user/{user}/unfollow', [FollowController::class, 'destroy'])->name('unfollow');
    Route::post('/post/{post}/likes', [LikeController::class, 'store'])->name('likes');
    Route::post('/post/{post}/unlikes', [LikeController::class, 'destroy'])->name('unlikes');
    Route::get('/conversations/{user}', [ConversationController::class, 'index'])->name('conversations.index');
    Route::post('/conversations/{user}', [ConversationController::class, 'store'])->name('conversations.store');
    Route::get('/conversations', [ConversationController::class, 'getMutualFollowConversations'])->name('conversations.mutual_follow');
    Route::post('/posts/{postId}/replies', [ReplyController::class, 'store'])->name('replies.store');
    Route::delete('/replies/{id}', [ReplyController::class, 'destroy'])->name('replies.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/sample', function () {
    return view('sample');
});

require __DIR__.'/auth.php';
