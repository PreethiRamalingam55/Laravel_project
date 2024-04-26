<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;


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


Route::group([], function(){
    Route::group(['prefix' => 'admin' ,'as' => 'admin.' ], function () {
        Route::group([
            'namespace' => 'Admin'
        ], function () {
            Auth::routes([
                'register' => false,
                'reset' => false, 
                'confirm' => false, 
            ]);
        });
        Route::group([
            'middleware' => ['auth:admin'],
            'namespace' => 'Admin'
        ], function () {
            Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');
		});
    });
});