<?php


use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;


// Frontend Routes
Route::get('/login', [FrontendAuthController::class, 'showLoginForm'])->name('frontend.login.form');
Route::post('/login', [FrontendAuthController::class, 'login'])->name('frontend.login');

Route::get('/register', [FrontendAuthController::class, 'showRegisterForm'])->name('frontend.register.form');
Route::post('/register', [FrontendAuthController::class, 'register'])->name('frontend.register');

Route::get('/home', [FrontendHomeController::class, 'home'])->name('frontend.home');


Route::middleware(['auth.check:frontend'])->group(function () {

});