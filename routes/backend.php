<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProductController as BackendProductController;
use App\Http\Controllers\Backend\BackendDashboardController;
use App\Http\Controllers\Backend\AuthController as BackendAuthController;
use App\Http\Controllers\Backend\CategoryController as BackendCategoryController;
use App\Http\Controllers\Backend\SubCategoryController as BackendSubCategoryController;
use App\Http\Controllers\Backend\AttributeController as BackendAttributeController;
use App\Http\Controllers\Backend\AttributeValueController as BackendAttributeValueController;



Route::get('/backend', function () {
    return redirect()->route('backend.dashboard');
});
Route::prefix('backend')->name('backend.')->group(function () {
    Route::get('login', [BackendAuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('login', [BackendAuthController::class, 'login'])->name('login');
});

// Backend Protected Routes
Route::prefix('backend')->middleware(['auth.check:backend'])->name('backend.')->group(function () {



    Route::get('dashboard', [BackendDashboardController::class, 'index'])->name('dashboard');

    Route::post('logout', [BackendAuthController::class, 'logout'])->name('logout');

    // Main Categories
    Route::prefix('main-categories')->name('categories.')->controller(BackendCategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('update', 'update')->name('update');
        Route::delete('{id}', 'destroy')->name('destroy');
    });

    // Sub Categories
    Route::prefix('sub-categories')->name('subcategories.')->controller(BackendSubCategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('update', 'update')->name('update');
        Route::delete('{id}', 'destroy')->name('destroy');
    });


    // Attributes
    Route::prefix('attributes')->name('attributes.')->controller(BackendAttributeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{id}/update', 'update')->name('update');
        Route::delete('{id}', 'destroy')->name('destroy');
    });


    // Attribute Values
    Route::prefix('attribute-values')->name('attribute-values.')->controller(BackendAttributeValueController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{id}/update', 'update')->name('update');
        Route::delete('{id}', 'destroy')->name('destroy');
    });


    Route::prefix('products')->name('products.')->controller(BackendProductController::class)->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');

    });
});
