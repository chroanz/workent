<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test');
});

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('pages/login');
});
