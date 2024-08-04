<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'votes', 'comments')->latest()->get();
        return view('post.index', ['posts' => $posts]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'body' => 'required',
        ]);
        Auth::user()->posts()->create($attributes);
        return redirect('/');
    }

    public function edit($id)
    {
        $post = Post::select('id', 'body')->find($id);
        return redirect()->back()->with(['edit' => true, 'post' => $post->body, 'id' => $post->id]);
    }

    public function update($id)
    {
        $attribute = request()->validate([
            'body' => 'required',
        ]);
        $post = Post::find($id);
        if(!$post->user_id == Auth::id()){
            return redirect()->back();
        }
        $post->update($attribute);
        return redirect('/');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if(!$post->user_id == Auth::id()){
            return redirect()->back();
        }
        $post->delete();
        return redirect('/');
    }
}
