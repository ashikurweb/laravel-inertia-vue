<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');

Route::controller(RegisterController::class)->group(function () {
   Route::get('register',  'create')->name('register');
   Route::post('register', 'store'); 
});

Route::controller(AuthenticatedSessionController::class)->group(function () {
    Route::get('login',   'create')->name('login');
    Route::post('login',  'store');
    Route::post('logout', 'destroy')->name('logout');
});