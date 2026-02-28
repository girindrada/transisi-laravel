<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// redirect ke halaman login
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('companies', CompanyController::class)->withoutMiddleware([VerifyCsrfToken::class]);
Route::resource('employees', EmployeeController::class)->withoutMiddleware([VerifyCsrfToken::class]);



