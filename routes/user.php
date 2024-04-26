<?php

use App\Http\Controllers\User\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
//     Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [LoginController::class, 'login'])->name('login');
//     Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//     Route::get('/dashboard',[UsersController::class, 'index'])->name('dashboard');
// });

Route::group([], function(){
    Route::group(['prefix' => 'user' ,'as' => 'user.' ], function () {
        Route::group([
            'namespace' => 'User'
        ], function () {
            Auth::routes([
                'register' => false,
                'reset' => false, 
                'confirm' => false, 
                'verify' => false,
            ]);
        });
        Route::group([
            'middleware' => ['auth:user'],
        ], function () {
            Route::get('/dashboard',[UsersController::class, 'index'])->name('dashboard');
		});
    });
});



