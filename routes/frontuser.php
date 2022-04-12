<?php

use App\Http\Controllers\Admin\Dashboard\AdminDashboardController;
use App\Http\Controllers\Admin\Dashboard\User\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Dashboard\RolePermission\PermissionController;
use App\Http\Controllers\Admin\Dashboard\RolePermission\RoleController;
use App\Http\Controllers\Admin\Dashboard\User\EmployerController;
use App\Http\Controllers\Admin\Dashboard\User\JobseekerController;
use App\Http\Controllers\Admin\Dashboard\UserController;
use App\Http\Controllers\Frontend\Auth\EmployerLoginController;
use App\Http\Controllers\Frontend\Auth\EmployerRegisterController;
use App\Http\Controllers\Frontend\Auth\JobseekerLoginController;
use App\Http\Controllers\Frontend\Auth\JobseekerRegisterController;
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
    
    Route::get('/password/forgot', [LoginController::class, 'showForgotForm'])->name('forgot-pwd-form');
    Route::post('/password/reset', [LoginController::class, 'resetPassword'])->name('reset-pwd');
    Route::post('/password/reset-now', [LoginController::class, 'resetPasswordNow'])->name('reset-pwd-now');
    Route::get('/password/reset/{token}',[LoginController::class, 'showResetPasswordForm'])->name('reset-pwd-form');

    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::view('/register', 'dashboard.admin.register')->name('register');
    Route::post('/login', [LoginController::class, 'loginProcess'])->name('login-process');
    Route::post('/create', [RegisterController::class, 'store'])->name('create');
    
    
    Route::middleware(['auth:admin'])->group(function () {
        Route::patch('usr-a/change-role/{id}', [AdminController::class, 'changeRole'])->name('changeRole');
        Route::patch('usr-a/change-permission/{id}', [AdminController::class, 'changePermission'])->name('changePermission');
        Route::patch('usr-a/change-password/{id}', [AdminController::class, 'changePassword'])->name('changePwd');
        Route::resource('usr-a', AdminController::class);
        Route::resource('usr-e', EmployerController::class);
        Route::resource('usr-j', JobseekerController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/dashboard/users', [UserController::class, 'userList'])->name('dashboard-users-list');
        Route::get('/{username}', [AdminDashboardController::class, 'show'])->name('profile');
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
    Route::resource('usr', JobseekerRegisterController::class);

    Route::middleware(['auth:jobseeker'])->group(function () {
        
        Route::view('/home', 'dashboard.frontend.jobseeker-home')->name('home');
        Route::post('/logout', [JobseekerLoginController::class, 'logout'])->name('logout');
    });
});

// Employer routes
Route::group([
    'prefix' => 'employer',
    'as' => 'employer.',
], function () {
    Route::get('/login', [EmployerLoginController::class, 'show'])->name('login');
    Route::post('/login', [EmployerLoginController::class, 'loginProcess'])->name('login-process');
    
    Route::resource('usr', EmployerRegisterController::class);

    Route::middleware(['auth:employer'])->group(function () {
        Route::view('/home', 'dashboard.frontend.employer-home')->name('home');
        Route::post('/logout', [EmployerLoginController::class, 'logout'])->name('logout');
    });

});
