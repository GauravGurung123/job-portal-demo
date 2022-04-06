<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


// Admin routes
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',                                                                       
    // 'middleware' => ['auth:admin'],
], function () {
    Route::group(function () {
        Route::get('/login', [AdminController::class, 'show'])->name('login');
        Route::post('/login', [AdminController::class, 'loginProcess'])->name('login-process');
    });

    Route::middleware(['auth:admin',])->group(function () {
        Route::view('/home', 'dashboard.admin.home')->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});


// Jobseeker And Employer routes
Route::group([
    'prefix' => 'user',
    'as' => 'user.',                                                                       
], function () {
    Route::group(function () {
        Route::get('/login', [LoginController::class, 'show'])->name('login');
        Route::post('/login', [LoginController::class, 'loginProcess'])->name('login-process');
    });

    // Employer 
    Route::middleware(['auth:employer',])->group(function () {
        Route::view('/employer/ home', 'dashboard.frontend.employer-home')->name('employer-home');
        Route::post('/emp/logout', [LoginController::class, 'logout'])->name('employer-logout');
    });

    //Jobseeker
    Route::middleware(['auth:jobseeker'])->group(function () {
        Route::view('/jobseeker/home', 'dashboard.frontend.jobseeker-home')->name('jobseeker-home');
        Route::post('/jsk/logout', [LoginController::class, 'logout'])->name('jobseeker-logout');
    });
});