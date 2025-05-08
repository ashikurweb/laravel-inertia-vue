<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');

Route::controller(RegisterController::class)->group(function () {
   Route::get('register', 'create')->name('register');
   Route::post('register', 'store'); 
});