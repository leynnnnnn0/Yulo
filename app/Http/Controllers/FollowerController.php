<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function store()
    {
        request()->validate([
            'followed_id' => ['required', 'exists:users,id'],
        ]);
        Follower::firstOrCreate([
            'follower_id' => Auth::id(),
            'followed_id' => request('followed_id'),
        ]);
        return redirect()->back();
    }
}
