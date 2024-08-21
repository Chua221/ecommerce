<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function(){
    Route::get('/','ViewMain');
    Route::get('/login','ViewLogin')->name('login');
    Route::get('/register','ViewRegister');
    Route::get('/otp','ViewOtp');   
    Route::get('/add','ViewAdd');
    Route::get('/profile/{id}','ViewProfile')->name('profile');
    Route::get('/adress','ViewAddress')->name('adress');
    Route::get('/edit/{id}','ViewEdit')->name('edit');
    Route::get('/addadress/{id}','ViewAddAddress')->name('addadress');
    Route::post('/register','RegisterFunction');
    Route::post('/otp_verify','Checkotp');
    Route::post('/login','LoginFunction');
    Route::post('/logout','LogoutFunction')->name('logout');
    Route::post('/add','AddFunction');
    Route::post('/profile','CompleteProfile');
    Route::post('/adress','AddAddressFunction');
    Route::delete('/delete/{id}','DeleteFunction')->name('delete');
    Route::post('/edit/{id}','EditFunction')->name('edit');
});