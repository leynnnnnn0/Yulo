<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserSharedPostController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'post_id' => ['required', 'exists:posts,id'],
        ]);

        Auth::user()->sharedPosts()->create($attributes);

        return json_encode(['success' => true]);

    }
}
