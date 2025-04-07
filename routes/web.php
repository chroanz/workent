<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('/registrar', 'store')->name('auth.store');
    Route::post('/login', 'authenticate')->name('auth.authenticate');

    Route::get('/login', function () {
        return view('pages/auth/login');
    })->name("auth.login");
    Route::get('/registrar', function () {
        return view('pages/auth/registrar');
    })->name("auth.registrar");
    Route::get('/cadastrar', function () {
        return view('pages/auth/cadastrar');
    })->name("auth.cadastrar");

    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
    });

Route::get('/', function () {
    return view('pages/salas/salas');
});

Route::get('/salas/{id}', function () {
    return view('pages/salas/detalhes');
})->middleware(AdminMiddleware::class) ;

Route::get('/salas', function () {
    return view('pages/salas/salas');
});
