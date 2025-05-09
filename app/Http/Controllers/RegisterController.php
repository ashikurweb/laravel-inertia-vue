<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return inertia('Auth/Register');
    }

    public function store(RegisterRequest $request)
    {
        $fields = $request->validated();

        $user = $this->createUser($fields);
        $this->loginUser($user);

        return to_route('home');
    }

    private function createUser(array $fields)
    {
        return User::create($fields);
    }

    private function loginUser(User $user)
    {
        Auth::login($user); 
    }
}
