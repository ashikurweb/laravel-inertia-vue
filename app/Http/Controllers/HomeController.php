<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () 
    {
        $users = User::paginate(10);
        sleep(2);
        return Inertia::render('Home', ['users' => $users]);
    }
}
