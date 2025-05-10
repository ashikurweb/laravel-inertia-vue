<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function create()
    {
        sleep(2);
        return inertia('Auth/Register');
    }

    public function store(RegisterRequest $request)
    {
        // sleep(2);
        
        $fields = $request->validated();
        $fields['image'] = $this->imageUpload($request);

        $user = $this->createUser($fields);
        $this->loginUser($user);

        return to_route('dashboard');
    }

    private function createUser(array $fields)
    {
        return User::create($fields);
    }

    private function loginUser(User $user)
    {
        Auth::login($user); 
    }

    private function imageUpload ( Request $request ) {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            return Storage::putFile('images', $image);
        }
    
        return null;
    }
}
