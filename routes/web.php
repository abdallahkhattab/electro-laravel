<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::prefix('dashboard')->group(function () {
    Route::get('/', function() {
        return view('dashboard.includes.dashboard');
    })->name('dashboard.main');

    /*
    Route::get('/categories', function() {
        return view('dashboard.includes.categories.categories');
    })->name('dashboard.category');
*/

    // display category
    Route::get('/categories',[CategoryController::class,'index'])
    ->name('dashboard.category');


    //display creation form
    Route::get('/categories/create-category',[CategoryController::class,'create'])
    ->name('dashboard.createCategory.show');

    //update Category

    Route::get('/categories/edit/{category}',[CategoryController::class,'edit'])
    ->name('dashboard.createCategory.edit');

    Route::put('/update-category/{category}',[CategoryController::class,'update'])
    ->name('dashboard.updateCategory');

    //save category
    Route::post('/create-category',[CategoryController::class,'store'])
    ->name('dashboard.createCategory.store');

    //delete category
    Route::delete('categories/delete-category/{category}',[CategoryController::class,'destroy'])
    ->name('dashboard.deleteCategory');

    Route::get('/brands', function() {
        return view('dashboard.includes.brands.brands');
    })->name('dashboard.brands');

    Route::get('/create-brand', function() {
        return view('dashboard.includes.brands.create-brand');
    })->name('dashboard.createBrands');

    Route::get('/sub-category', function() {
        return view('dashboard.includes.categories.subcategory');
    })->name('dashboard.subCategory');

    Route::get('/create-subCategory', function() {
        return view('dashboard.includes.categories.create-subcategory');
    })->name('dashboard.createSubCategory');

    Route::get('/products', function() {
        return view('dashboard.includes.products.products');
    })->name('dashboard.products');

    Route::get('/create-product', function() {
        return view('dashboard.includes.products.create-product');
    })->name('dashboard.createProducts');

    Route::get('/orders', function() {
        return view('dashboard.includes.orders.orders');
    })->name('dashboard.orders');

    Route::get('/users', function() {
        return view('dashboard.includes.users.users');
    })->name('dashboard.users');

    Route::get('/create-user', function() {
        return view('dashboard.includes.users.create-user');
    })->name('dashboard.createUsers');

    Route::get('/pages', function() {
        return view('dashboard.includes.pages.pages');
    })->name('dashboard.pages');

    Route::get('/create-page', function() {
        return view('dashboard.includes.pages.create-page');
    })->name('dashboard.createPages');
});

