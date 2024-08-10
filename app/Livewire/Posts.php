<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Posts extends Component
{
    public function render()
    {
        return view('livewire.posts', ['posts' => Post::all()]);
    }
}
