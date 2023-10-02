<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/about', function () {
    return Inertia::render('About',[
        'belone'=>asset('assets/img/belone.jpeg'),
        'naka'=>asset('assets/img/naka.jpeg'),
        'sergio'=>asset('assets/img/sergio.jpeg'),
        'pedro'=>asset('assets/img/pedro.jpeg'),
        'aderson'=>asset('assets/img/aderson.jpeg'),
    ]);
})->name('about');

require __DIR__.'/auth.php';
