<?php

namespace App\Http\Controllers;

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

        // Extract the post data from sharedPosts if needed
        $sharedPosts = $sharedPosts->map(function($sharedPost) {
            return $sharedPost->post; // Adjust this if `post` is a relationship
        });
        // Merge the collections
        $allPosts = $sharedPosts->merge($posts)->sortByDesc('created_at');

        return view('profile.index', ['posts' => $allPosts]);
    }

    public function show($id)
    {
        $user = User::with('posts', 'sharedPosts')->latest()->find($id);
        return view('profile.show', ['user' => $user]);
    }

}
