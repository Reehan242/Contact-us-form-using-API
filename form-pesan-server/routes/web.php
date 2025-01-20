<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [MessageController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::put('/dashboard/{id}', [MessageController::class,'update'])->middleware(['auth', 'verified'])->name('dashboard.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
