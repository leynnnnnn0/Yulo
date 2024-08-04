<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store()
    {
        request()->validate([
            'post_id' => ['required', 'exists:posts,id'],
            'body' => 'required',
        ]);

        Auth::user()->comments()->create([
            'post_id' => request('post_id'),
            'body' => request('body'),
        ]);

        return redirect()->back();
    }

    public function destroy()
    {
        request()->validate([
            'comment_id' => ['required', 'exists:comments,id'],
        ]);
        Auth::user()->comments()->find(request('comment_id'))->delete();

        return redirect()->back();

    }
}
