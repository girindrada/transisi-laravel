<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// redirect ke halaman login
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);

    Route::get('companies/{company}/export-pdf', [CompanyController::class, 'exportPdf'])->name('companies.export-pdf');
    Route::post('companies/{company}/import-employees', [CompanyController::class, 'importEmployees'])->name('companies.import-xlsx');
});



