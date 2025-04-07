<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\EvaluationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages/salas/salas');
});

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

Route::prefix('admin')->group(function () {
    Route::get('/reservas', function () {
        return view('pages/admin/rent/index');
    })->name('admin.rent.index');

    Route::get('/salas', function () {
        return view('pages/admin/room/index');
    })->name('admin.room.index');
    Route::get('/salas/criar', function () {
        return view('pages/admin/room/create');
    })->name('admin.room.create');

    Route::get('/pagamentos', function () {
        return view('pages/admin/payment/index');
    })->name('admin.payment.index');
});

Route::prefix('avaliar')->controller(EvaluationController::class)->group(function () {
    Route::get('/', 'create')->name('evaluation.create');
    Route::post('/', 'store')->name('evaluation.store');
});

Route::get('/salas/{id}', function () {
    return view('pages/salas/detalhes');
})->middleware(AdminMiddleware::class);

Route::get('/salas', function () {
    return view('pages/salas/salas');
});


Route::prefix('admin')->group(function () {
    Route::get("/reservas", function () {
        return view("pages/admin/reservas");
    })->name("admin.reservas");
});
Route::get('/salas/{id}', function () {
    return view('pages/salas/detalhes');
});
Route::get('/reservas/{id}', function () {
    return view('pages/rent/show');
})->name('rent.show');

Route::prefix('perfil')->group(function () {
    Route::get('/', function () {
        return view('pages/profile/edit');
    })->name('profile.edit');
});
