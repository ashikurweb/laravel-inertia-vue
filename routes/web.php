<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    sleep(1);
    return Inertia::render('Home');
});

Route::get('/about', function () {
    sleep(1); 
    return Inertia::render('About', [
        'name' => 'Sabikun Nahar Priya',
    ]);
});