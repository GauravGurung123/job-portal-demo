<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Frontend\Auth\EmployerLoginController;
use App\Http\Controllers\Frontend\Auth\JobseekerLoginController;
use App\Http\Controllers\Frontend\Employer\EmployerController;
use App\Http\Controllers\Frontend\Jobseeker\JobseekerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Jobseeker, Employer and Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register user routes for your application.
|
 */

// Admin routes
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::view('/register', 'dashboard.admin.register')->name('register');
    Route::post('/login', [LoginController::class, 'loginProcess'])->name('login-process');
    Route::post('/create', [AdminController::class, 'store'])->name('create');
    

    
    Route::middleware(['auth:admin'])->group(function () {
        Route::view('/home', 'dashboard.admin.home')->name('home');
        Route::get('/{username}', [AdminController::class, 'show'])->name('profile');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});

// Jobseeker  routes
Route::group([
    'prefix' => 'jobseeker',
    'as' => 'jobseeker.',
], function () {

    Route::get('/login', [JobseekerLoginController::class, 'show'])->name('login');
    Route::post('/login', [JobseekerLoginController::class, 'loginProcess'])->name('login-process');
    Route::view('/register', 'dashboard.frontend.register')->name('register');


    Route::middleware(['auth:jobseeker'])->group(function () {
        Route::view('/home', 'dashboard.frontend.jobseeker-home')->name('home');
        Route::post('/logout', [JobseekerLoginController::class, 'logout'])->name('logout');
    });

    Route::resource('js', JobseekerController::class);
});

// Employer routes
Route::group([
    'prefix' => 'employer',
    'as' => 'employer.',
], function () {
    Route::get('/login', [EmployerLoginController::class, 'show'])->name('login');
    Route::post('/login', [EmployerLoginController::class, 'loginProcess'])->name('login-process');
    Route::get('/register', [EmployerController::class, 'registerForm'])->name('register');

    Route::middleware(['auth:employer'])->group(function () {
        Route::view('/home', 'dashboard.frontend.employer-home')->name('home');
        Route::post('/logout', [EmployerLoginController::class, 'logout'])->name('logout');
    });

    Route::resource('em', JobseekerController::class);

});
