<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Dashboard routes
Route::prefix('dashboard')->middleware('admin')->group(function () {
    Route::get('/', function () {
        return view('dashboard.includes.dashboard');
    })->name('dashboard.main');

    Route::get('/admin',[AdminController::class,'index'])
    ->name('dashboard.admin.index');

    // Category routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('dashboard.category');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('dashboard.createCategory.show');
    Route::post('/categories', [CategoryController::class, 'store'])->name('dashboard.createCategory.store');
    Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('dashboard.createCategory.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('dashboard.updateCategory');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('dashboard.deleteCategory');

    // Sub-category routes
    Route::get('/sub-categories', [SubCategoryController::class, 'index'])->name('dashboard.subCategory');
    Route::get('/sub-categories/create', [SubCategoryController::class, 'create'])->name('dashboard.createSubCategory.show');
    Route::post('/sub-categories', [SubCategoryController::class, 'store'])->name('dashboard.createSubCategory.store');
    Route::get('/sub-categories/edit/{subCategory}', [SubCategoryController::class, 'edit'])->name('dashboard.subcategory.edit');
    Route::put('/sub-categories/{subCategory}', [SubCategoryController::class, 'update'])->name('dashboard.subcategory.update');
    Route::delete('/sub-categories/{subCategory}', [SubCategoryController::class, 'destroy'])->name('dashboard.subcategory.delete');

    // Brand routes
    Route::get('/brands', [BrandsController::class, 'index'])->name('dashboard.brands');
    Route::get('/brands/create', [BrandsController::class, 'create'])->name('dashboard.createBrands');
    Route::post('/brands', [BrandsController::class, 'store'])->name('dashboard.createBrands.store');
    Route::get('/brands/edit/{brand}', [BrandsController::class, 'edit'])->name('dashboard.editBrands');
    Route::put('/brands/{brand}', [BrandsController::class, 'update'])->name('dashboard.updateBrands');
    Route::delete('/brands/{brand}', [BrandsController::class, 'destroy'])->name('dashboard.deleteBrands');

    // Product routes
    Route::get('/products', [ProductController::class, 'index'])->name('dashboard.products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('dashboard.createProducts');
    Route::post('/products', [ProductController::class, 'store'])->name('dashboard.storeProducts');
    Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('dashboard.editProducts');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('dashboard.updateProducts');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('dashboard.deleteProduct');

    // Other dashboard pages
    Route::get('/orders', function () {
        return view('dashboard.includes.orders.orders');
    })->name('dashboard.orders');

    Route::get('/users', function () {
        return view('dashboard.includes.users.users');
    })->name('dashboard.users');

    Route::get('/users/create', function () {
        return view('dashboard.includes.users.create-user');
    })->name('dashboard.createUsers');

    Route::get('/pages', function () {
        return view('dashboard.includes.pages.pages');
    })->name('dashboard.pages');

    Route::get('/pages/create', function () {
        return view('dashboard.includes.pages.create-page');
    })->name('dashboard.createPages');
});

// Authentication routes
Auth::routes();

// Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

