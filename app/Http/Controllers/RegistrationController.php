<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create(): Application|View|Factory
    {
        return view('auth.register');
    }

    public function store()
    {
        // Validate
        $attributes = request()->validate([
            'username' => ['required', 'string', 'min:3', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Store
        $user = User::create($attributes);

        // regenerate the session token
        request()->session()->regenerate();

        // Log in
        Auth::login($user);

        // Redirect
        return redirect('/')->with('success', 'Account created successfully!');
    }
}
