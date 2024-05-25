<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\ResetPasswordController;
use App\Http\Controllers\User\Auth\ForgetPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
    // Authentication routes
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/register', [UserController::class, 'register'])->name('register');
    
    // Forgot password routes
    Route::post('/forgot-password', [ForgetPasswordController::class , 'forget_password'])->name('forgot_password');
    Route::get('/password/reset', [ForgetPasswordController::class , 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgetPasswordController::class , 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset']);
    
    // Authenticated routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});
