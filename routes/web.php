<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function(){
    Route::post('/register','RegisterFunction');
    Route::post('/otp_verify','Checkotp');
    Route::post('/login','LoginFunction');
    Route::post('/logout','LogoutFunction')->name('logout');
    Route::post('/add','AddFunction');
    Route::post('/profile','CompleteProfile');
    Route::post('/adress','AddAddressFunction');
    Route::delete('/delete/{id}','DeleteFunction')->name('delete');
    Route::post('/edited/{id}','EditFunction')->name('edited');
    Route::post('/carts/{id}','AddToCartsFunction')->name('carts');
    Route::post('/cart/{id}','AddToCartFunction')->name('carted');
});

Route::controller(ViewController::class)->group(function(){
    Route::get('/','ViewMain');
    Route::get('/login','ViewLogin')->name('login');
    Route::get('/register','ViewRegister');
    Route::get('/otp','ViewOtp');   
    Route::get('/add','ViewAdd');
    Route::get('/profile/{id}','ViewProfile')->name('profile');
    Route::get('/adress','ViewAddress')->name('adress');
    Route::get('/edit/{id}','ViewEdit')->name('edit');
    Route::get('/cart','ViewCart')->name('cart');
    Route::get('/addadress/{id}','ViewAddAddress')->name('addadress');
    Route::get('/viewveg/{id}','ViewVeg')->name('viewveg');
});