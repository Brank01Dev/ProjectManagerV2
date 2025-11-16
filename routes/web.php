<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');


Route::middleware(['auth', 'verified'])->group(function () {

    
    Route::get('/dashboard', [ProjectController::class, 'index'])
        ->name('dashboard');


    Route::resource('/Project', ProjectController::class);

    
    Route::delete('/Project/{id}/force-delete', [ProjectController::class, 'forceDelete'])
        ->name('Project.forceDelete');

    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';