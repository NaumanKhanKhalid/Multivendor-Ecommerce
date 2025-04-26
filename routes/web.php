<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController  as BackendAuthController;
use App\Http\Controllers\Frontend\AuthController  as  FrontendAuthController;
use App\Http\Controllers\Frontend\HomeController  as  FrontendHomeController;


Route::get('/', function () {
    return view('welcome');
});


// Backend Routes
Route::prefix('backend')->group(function () {
    Route::get('/login', [BackendAuthController::class, 'showLoginForm'])->name('backend.login.form');
    Route::post('/login', [BackendAuthController::class, 'login']);
});

Route::middleware(['auth.check:frontend'])->group(function () {

});

Route::prefix('backend')->middleware(['auth.check:backend'])->group(function () {

});


// Frontend Routes
Route::get('/login', [FrontendAuthController::class, 'showLoginForm'])->name('frontend.login.form');
Route::post('/login', [FrontendAuthController::class, 'login'])->name('frontend.login');

Route::get('/register', [FrontendAuthController::class, 'showRegisterForm'])->name('frontend.register.form');
Route::post('/register', [FrontendAuthController::class, 'register'])->name('frontend.register');

Route::get('/home', [FrontendHomeController::class, 'home'])->name('frontend.home');
