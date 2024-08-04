<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(! Auth::attempt($attributes))
        {
            throw ValidationException::withMessages([
               'email' => 'The provided credentials do not match our records.'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/')->with('success', 'Logged in successfully!');
    }
    public function destroy()
    {
       Auth::logout();
        request()->session()->regenerate();
        return redirect('/');

    }
}
