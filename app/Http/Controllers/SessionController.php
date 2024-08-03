<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function destroy()
    {
       Auth::logout();
        request()->session()->regenerate();
        return redirect('/');

    }
}
