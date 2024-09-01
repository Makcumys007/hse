<?php

use App\Http\Controllers\HSEController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('hseboard');
    } else {
        return redirect('login');
    }
});

Route::get('/hse', [HSEController::class,'index'])->name('hse');

Route::get('/hseboard', function () {
    return view('admin.hseboard');
})->middleware(['auth', 'verified'])->name('hseboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
