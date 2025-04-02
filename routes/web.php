<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/salas');
});


Route::get('/login', function () {
    return view('pages/login');
});


Route::get('/detalhes', function () {
    return view('pages/detalhes');
});
