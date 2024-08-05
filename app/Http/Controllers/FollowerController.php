<?php

namespace App\Http\Controllers;

use App\Models\Follower;
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

    public function destroy()
    {
        request()->validate([
            'followed_id' => ['required', 'exists:users,id'],
        ]);
        $following = Follower::where('followed_id', request('followed_id'))
            ->where('follower_id', Auth::id())->first();
        $following->delete();
        return redirect()->back();
    }

}
