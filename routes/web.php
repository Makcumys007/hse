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



Route::get('/hseboard', [HSEController::class,'create'])->middleware(['auth', 'verified'])->name('hseboard');

Route::post('/hseboard', [HSEController::class,'store'])->middleware(['auth', 'verified'])->name('hseboard');
//Route::post('/hseboard/upload-video', [HSEController::class,'upload_video'])->middleware(['auth', 'verified'])->name('hseboard.upload.video');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
