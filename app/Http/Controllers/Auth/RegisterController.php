<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        sleep(2);
        return inertia('Auth/Register');
    }

    public function store(RegisterRequest $request)
    {
        sleep(2);
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
