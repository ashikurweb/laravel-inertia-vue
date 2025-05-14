<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index ( Request $request ) 
    {
        $filters = $request->only('search');

        $users = User::query()
            ->when($filters['search'] ?? false, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Home', [
            'users'   => $users,
            'filters' => $filters,
            'can'     => [
                'deleteUser' => Auth::check()
                    ? Auth::user()->can('delete', User::class)
                    : false,
            ],
        ]);
    }
}
