<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Models\dashboard\SubCategory;
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
    Route::get('/categories/create',[CategoryController::class,'create'])
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
    Route::delete('categories/delete/{category}',[CategoryController::class,'destroy'])
    ->name('dashboard.deleteCategory');
/*********************************************************************************** */

  // sub-Category



    Route::get('/sub-category',[SubCategoryController::class,'index'])
    ->name('dashboard.subCategory');

    Route::get('/sub-category/show',[SubCategoryController::class,'create'])
    ->name('dashboard.createSubCategory.show');

    
    

    Route::post('/sub-category',[SubCategoryController::class,'store'])
    ->name('dashboard.createSubCategory.store');


    Route::get('/sub-category/edit/{subCategory}',[SubCategoryController::class,'edit'])
    ->name('dashboard.subcategory.edit');

    Route::put('/subcategory-edit/{subCategory}',[SubCategoryController::class,'update'])
    ->name('dashboard.subcategory.update');

    Route::delete('/subcategory-delete/{subCategory}',[SubCategoryController::class,'destroy'])
    ->name('dashboard.subcategory.delete');

/*********************************************************************************** */





    Route::get('/brands',[BrandsController::class,'index'])
    ->name('dashboard.brands');


    Route::get('/create-brand/show',[BrandsController::class,'create'])
    ->name('dashboard.createBrands');

    Route::post('/create-brand',[BrandsController::class,'store'])
    ->name('dashboard.createBrands.store');


    Route::get('/edit-brands/{brand}',[BrandsController::class,'edit'])
    ->name('dashboard.editBrands');

    
    Route::put('/edit-brands/update/{brand}',[BrandsController::class,'update'])
    ->name('dashboard.updateBrands');

    
    Route::delete('/edit-brands/delete/{brand}',[BrandsController::class,'destroy'])
    ->name('dashboard.deleteBrands');
/*********************************************************************************** */

  
    Route::get('/products',[ProductController::class,'index'])
    ->name('dashboard.products');


    Route::get('/create-product',[ProductController::class,'create'])
    ->name('dashboard.createProducts');

    Route::post('/store-product',[ProductController::class,'store'])
    ->name('dashboard.storeProducts');

    Route::get('/edit-product/{product}',[ProductController::class,'edit'])
    ->name('dashboard.editProducts');

    Route::put('/products/update/{product}',[ProductController::class,'update'])
    ->name('dashboard.updateProducts');

    /*********************************************************************************** */


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

