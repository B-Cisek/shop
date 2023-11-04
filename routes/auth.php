<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('logowanie', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('logowanie', [AuthenticatedSessionController::class, 'store'])->name('login');

    Route::get('rejestracja', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('rejestracja', [RegisteredUserController::class, 'store'])->name('register');

    Route::get('przypominanie-hasla', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('przypominanie-hasla', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('przypominanie-hasla/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('resetowanie-hasla', [NewPasswordController::class, 'store'])->name('password.store');
});


Route::middleware('auth')->group(function () {
    Route::post('wyloguj', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('zweryfikacja-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
});
