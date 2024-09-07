<?php

use App\Http\Controllers\HSEController;
use App\Http\Controllers\GateController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers;
use App\Http\Middleware\LocaleMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect('hseboard');
    } else {
        return redirect('login');
    }
});

Route::post('/profile/locale', [ProfileController::class, 'updateLocale'])->name('profile.updateLocale');



Route::get('/gate', [GateController::class, 'index'])->name('gate');
Route::get('/hse', [HSEController::class, 'index'])->name('hse');

Route::middleware([LocaleMiddleware::class])->group(function () {
    Route::get('/hseboard', [HSEController::class,'create'])->middleware(['auth', 'verified'])->name('hseboard');
    Route::post('/hseboard', [HSEController::class,'store'])->middleware(['auth', 'verified'])->name('hseboard');

    Route::get('/gateboard', [GateController::class,'create'])->middleware(['auth', 'verified'])->name('gateboard');
    Route::post('/gateboard', [GateController::class,'store'])->middleware(['auth', 'verified'])->name('gateboard');

    Route::post('video-upload', [ VideoController::class, 'uploadVideo' ])->name('store.video');

    Route::post('image-upload', [ ImageController::class, 'uploadImage' ])->name('store.image');
});

    
    


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
