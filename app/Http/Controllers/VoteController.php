<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\NoReturn;

class VoteController extends Controller
{
    public function store()
    {
        request()->validate([
            'post_id' => ['required', 'exists:posts,id'],
        ]);

        if($this->destroy(request('post_id')))
            return json_encode(['success' => true]);

        Vote::create([
           'user_id' => Auth::id(),
           'post_id' => request('post_id'),
           'vote' => 'upVote'
        ]);

        return json_encode(['success' => true]);


    }


    public function destroy($id)
    {
        $result = Vote::where('user_id', Auth::id())->where('post_id', request('post_id'))->first();
        if(!$result) return false;
        $result->delete();
        return true;
    }
}
