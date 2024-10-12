<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| front Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('',function(){
    return view('front.includes.homeContent');
});


Route::get('/product',function(){
    return view('front.includes.product');
});

Route::get('/checkout',function(){
    return view('front.includes.checkout');
});


Route::get('/store',function(){
    return view('front.includes.store');
});



Route::get('/blank',function(){
    return view('front.includes.blank');
});
