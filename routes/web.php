<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->controller(AuthController::class)->group(function (){
    Route::post('/', 'store')->name('auth.store');
    Route::post('/login','login')->name('auth.login');
});

Route::get('/', function () {
    return view('test');
});

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('pages/login');
});
