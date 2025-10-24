<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainPageController;
use App\Http\Controllers\clientPageController;
use App\Http\Controllers\pricePageController;
use App\Http\Controllers\bilderPageController;
use App\Livewire\Actions\Logout;
use Illuminate\Http\Request;

Route::get('/main', [mainPageController::class, 'index'])->name('main.index');
Route::get('/client', [clientPageController::class, 'index'])->name('client.index');
Route::get('/price', [pricePageController::class, 'index'])->name('price.index');
Route::get('/bilder', [bilderPageController::class, 'index'])->name('bilder.index');

// Защищенные маршруты (только для ЗАРЕГИСТРИРОВАННЫХ обычных пользователей)
Route::middleware(['auth', 'user.only'])->group(function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    // Здесь можно добавить другие защищенные маршруты для пользователей
    // Например: личный кабинет, настройки и т.д.
});



require __DIR__.'/auth.php';

