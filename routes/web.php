<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromoMessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/promo', PromoMessageController::class)->name('promo');

Route::middleware('auth')->group(function () {
    Route::get('/konto', [ProfileController::class, 'create'])->name('profile');
});

require_once __DIR__ . '/auth.php';
