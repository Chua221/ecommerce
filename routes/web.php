<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function(){
    Route::get('/','ViewMain');
    Route::get('/login','ViewLogin')->name('login');
    Route::get('/register','ViewRegister');
    Route::get('/otp','ViewOtp');
    Route::post('/register','RegisterFunction');
    Route::post('/otp_verify','Checkotp');
    Route::post('/login','LoginFunction');
    Route::post('/logout','LogoutFunction')->name('logout');
});