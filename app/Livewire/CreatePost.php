<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreatePost extends Component
{
    #[Rule('required')]
    public string $body;

    public function render()
    {
        return view('livewire.create-post');
    }

    public function store()
    {
        // Validate
        $validate = $this->validateOnly('body');
        // Create
        Auth::user()->posts()->create($validate);
        // Clear the input / notify success
        $this->reset('body');
        notify()->success('Test');
        session()->flash('success', 'Post successfully created.');
    }
}
