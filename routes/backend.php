<?php
use App\Http\Controllers\Backend\BackendDashboardController;
use App\Http\Controllers\Backend\AuthController as BackendAuthController;
use App\Http\Controllers\Backend\CategoryController;



Route::prefix('backend/')->middleware(['auth.check:backend'])->group(function () {
    Route::get('dashboard', [BackendDashboardController::class, 'index'])->name('backend.dashboard');
    Route::post('logout', [BackendAuthController::class, 'logout'])->name('backend.logout');

    Route::prefix('category/')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('update', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    });
});

// Backend Routes
Route::prefix('backend/')->group(function () {
    Route::get('login', [BackendAuthController::class, 'showLoginForm'])->name('backend.login.form');
    Route::post('login', [BackendAuthController::class, 'login'])->name('backend.login');

    // ========== Category Module Routes Start ==========


    // ========== Category Module Routes End ==========





    // // SubCategory Routes
    // Route::get('subcategories', [SubCategoryController::class, 'index'])->name('backend.subcategories.index');
    // Route::get('subcategories/create', [SubCategoryController::class, 'create'])->name('backend.subcategories.create');
    // Route::post('subcategories', [SubCategoryController::class, 'store'])->name('backend.subcategories.store');
    // Route::get('subcategories/{subcategory}/edit', [SubCategoryController::class, 'edit'])->name('backend.subcategories.edit');
    // Route::put('subcategories/{subcategory}', [SubCategoryController::class, 'update'])->name('backend.subcategories.update');
    // Route::delete('subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('backend.subcategories.destroy');

});
