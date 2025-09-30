<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainPageController;
use App\Http\Controllers\clientPageController;
use App\Http\Controllers\pricePageController;


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/main', [mainPageController::class, 'index'])->name('main.index');
Route::get('/client', [clientPageController::class, 'index'])->name('client.index');
Route::get('/price', [pricePageController::class, 'index'])->name('price.index');
require __DIR__.'/auth.php';
