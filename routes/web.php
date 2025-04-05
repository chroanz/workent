<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Models\Payment;
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
    
});

Route::get('/', function () {
    return view('pages/salas/salas');
})->name('home');

Route::get('/salas', function () {
    return view('pages/salas/salas');
});

Route::get('/salas/detalhes', function () {
   return view('pages/salas/detalhes');
});

Route::get('/salas/pagamento', function () {
    return view('pages/salas/pagamento');
})->name("auth.pagamento");

Route::prefix('payment')->controller(PaymentController::class)->group(function () {
    Route::post('/', 'store')->name('payment.store');
});
