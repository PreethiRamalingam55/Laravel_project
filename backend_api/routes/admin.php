<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;

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


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', [AdminController::class, 'user'])->name('index');
            Route::get('/{id}/show', [AdminController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit');
            Route::Post('/{id}/update', [AdminController::class, 'update'])->name('update');
        });
    });
});