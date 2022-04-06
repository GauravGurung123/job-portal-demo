<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Frontend\Auth\EmployerLoginController;
use App\Http\Controllers\Frontend\Auth\JobseekerLoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Admin routes
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'loginProcess'])->name('login-process');

    Route::middleware(['auth:admin'])->group(function () {
        Route::view('/home', 'dashboard.admin.home')->name('home');
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

    Route::middleware(['auth:employer'])->group(function () {
        Route::view('/home', 'dashboard.frontend.employer-home')->name('home');
        Route::post('/logout', [EmployerLoginController::class, 'logout'])->name('logout');
    });

});
