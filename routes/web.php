<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

//default loginpage
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});


Route::get('/dashboard', function () {
    return redirect()->route('companies.index');
})->middleware(['auth', 'verified'])->name('dashboard');



//crud
Route::middleware('auth')->group(function () {


    Route::resource('companies', CompanyController::class);


    Route::prefix('companies/{company}')->group(function () {
        Route::get('employees', [EmployeeController::class, 'companyEmployees'])
            ->name('companies.employees');
        Route::get('employees/create', [EmployeeController::class, 'createForCompany'])
            ->name('companies.employees.create');
        Route::post('employees', [EmployeeController::class, 'storeForCompany'])
            ->name('companies.employees.store');
    });


    Route::resource('employees', EmployeeController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
