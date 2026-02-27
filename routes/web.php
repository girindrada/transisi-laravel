<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// redirect ke halaman login
Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
