<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create() {
        sleep(2);
        return inertia('Auth/Login');
    }

    public function store ( LoginRequest $request ) {
        sleep(2);
        $credentials = $request->only('email', 'password');
        $remember    = $request->has('remember');

        if (Auth::attempt( $credentials, $remember )) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

}
