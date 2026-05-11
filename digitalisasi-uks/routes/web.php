<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin Only Routes
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('classes', SchoolClassController::class);
        Route::resource('students', StudentController::class);
        Route::resource('medicines', MedicineController::class)->except(['index']);
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    });

    // Petugas & Admin Routes
    Route::middleware(['role:admin,petugas'])->group(function () {
        Route::get('medicines', [MedicineController::class, 'index'])->name('medicines.index');
        Route::resource('treatments', TreatmentController::class);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
