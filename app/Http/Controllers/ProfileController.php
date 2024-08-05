<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Post;
use App\Models\User;
use App\Models\UserSharedPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->get();
        $sharedPosts = UserSharedPost::with('post')->where('user_id', Auth::id())->latest()->get();
        $followers = Follower::where('followed_id', Auth::id())->get();

        // Extract the post data from sharedPosts if needed
        $sharedPosts = $sharedPosts->map(function($sharedPost) {
            return $sharedPost->post; // Adjust this if `post` is a relationship
        });
        // Merge the collections
        $allPosts = $sharedPosts->merge($posts);

        return view('profile.index', ['posts' => $allPosts, 'followers' => $followers]);
    }

    public function show($id)
    {
        $followers = Follower::where('followed_id', $id)->get();
        $user = User::with('posts', 'sharedPosts')->latest()->find($id);
        $posts = $user->posts;
        $sharedPosts = $user->sharedPosts;
        $sharedPosts = $sharedPosts->map(function($sharedPost) {
            return $sharedPost->post;
        });
        $allPosts = $sharedPosts->merge($posts);
        return view('profile.show', ['user' => $user, 'posts' => $allPosts, 'followers' => $followers]);
    }

}
