<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('pages/login');
})->name("login");



Route::get('/registrar', function () {
    return view('pages/registrar');
})->name("registrar");


Route::get('/cadastrar', function () {
    return view('pages/cadastrar');
})->name("cadastrar");
