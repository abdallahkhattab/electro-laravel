<?php

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





Route::get('/dashboard',function(){
    return view('dashboard.includes.dashboard');
})->name('dashboard.main');

Route::get('/categories',function(){
    return view('dashboard.includes.categories.categories');
})->name('dashboard.category');

Route::get('/create-category',function(){
    return view('dashboard.includes.categories.create-category');
})->name('dashboard.createCategory');


Route::get('/brands',function(){
    return view('dashboard.includes.brands.brands');
})->name("dashboard.brand");



Route::get('/sub-category',function(){
    return view('dashboard.includes.categories.subcategory');
})->name('dashboard.subCategory');

Route::get('/create-subCategory',function(){

    return view('dashboard.includes.categories.create-subcategory');
})->name('dashboard.createSubCategory');

Route::get('/brands',function(){
    return view('dashboard.includes.brands.brands');
})->name('dashboard.brands');


Route::get('/create-brand',function(){
    return view('dashboard.includes.brands.create-brand');
})->name('dashboard.createBrands');

Route::get('/products',function(){
    return view('dashboard.includes.products.products');
})->name('dashboard.products');

Route::get('/create-product',function(){
    return view('dashboard.includes.products.create-product');
})->name('dasboard.createProducts');

Route::get('/orders',function(){
    return view('dashboard.includes.orders.orders');
})->name('dashboard.orders');

Route::get('/users',function(){
    return view('dashboard.includes.users.users');
})->name('dashboard.users');

Route::get('/create-user',function(){
    return view('dashboard.includes.users.create-user');
})->name('dashboard.createUsers');


Route::get('/pages',function(){
    return view('dashboard.includes.pages.pages');
})->name('dashboard.pages');


Route::get('/create-page',function(){
    return view('dashboard.includes.pages.create-page');
})->name('dashboard.createPages');

