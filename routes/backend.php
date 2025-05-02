<?php
use App\Http\Controllers\Backend\CategoryController as BackendCategoryController;
use App\Http\Controllers\Backend\SubCategoryController as BackendSubCategoryController;
use App\Http\Controllers\Backend\BackendDashboardController;
use App\Http\Controllers\Backend\AuthController as BackendAuthController;



Route::prefix('backend/')->middleware(['auth.check:backend'])->group(function () {
    Route::get('dashboard', [BackendDashboardController::class, 'index'])->name('backend.dashboard');
    Route::post('logout', [BackendAuthController::class, 'logout'])->name('backend.logout');


    // ========== Main Category Module Routes Start ==========

    Route::prefix('main-category/')->group(function () {
        Route::get('categories', [BackendCategoryController::class, 'index'])->name('categories.index');
        Route::post('store', [BackendCategoryController::class, 'store'])->name('categories.store');
        Route::get('{id}/edit', [BackendCategoryController::class, 'edit'])->name('categories.edit');
        Route::put('update', [BackendCategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{id}', [BackendCategoryController::class, 'destroy'])->name('categories.destroy');
    });

    // ========== Main Category Module Routes End ==========


    // ========== Sub Category Module Routes Start ==========

    Route::prefix('sub-category/')->group(function () {
        Route::get('sub-categories', [BackendSubCategoryController::class, 'index'])->name('sub.categories.index');
        Route::post('store', [BackendSubCategoryController::class, 'store'])->name('sub.categories.store');
        Route::get('{id}/edit', [BackendSubCategoryController::class, 'edit'])->name('sub.categories.edit');
        Route::put('update', [BackendSubCategoryController::class, 'update'])->name('sub.categories.update');
        Route::delete('/{id}', [BackendSubCategoryController::class, 'destroy'])->name('sub.categories.destroy');
    });

    // ========== Sub Category Module Routes End ==========



});

// Backend Routes
Route::prefix('backend/')->group(function () {
    Route::get('login', [BackendAuthController::class, 'showLoginForm'])->name('backend.login.form');
    Route::post('login', [BackendAuthController::class, 'login'])->name('backend.login');







    // // SubCategory Routes
    // Route::get('subcategories', [SubCategoryController::class, 'index'])->name('backend.subcategories.index');
    // Route::get('subcategories/create', [SubCategoryController::class, 'create'])->name('backend.subcategories.create');
    // Route::post('subcategories', [SubCategoryController::class, 'store'])->name('backend.subcategories.store');
    // Route::get('subcategories/{subcategory}/edit', [SubCategoryController::class, 'edit'])->name('backend.subcategories.edit');
    // Route::put('subcategories/{subcategory}', [SubCategoryController::class, 'update'])->name('backend.subcategories.update');
    // Route::delete('subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('backend.subcategories.destroy');

});
