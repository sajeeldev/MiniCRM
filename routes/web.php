<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {
    Route::resource('companies', CompanyController::class)->name('index', 'companies.index');
    Route::resource('employees', EmployeeController::class)->name('index', 'employees.index');
});

