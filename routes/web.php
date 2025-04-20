<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\RoomController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\HasNoClientMiddleware;

Route::get('/', [RoomController::class, 'index'])->name('home');

Route::prefix('auth')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('/registrar', 'create')->name('auth.create');
        Route::post('/registrar', 'store')->name('auth.store');

        Route::get('/login', 'login')->name('auth.login');
        Route::post('/login', 'authenticate')->name('auth.authenticate');

        Route::post('/logout', 'logout')->name('auth.logout');
    });

Route::prefix('perfil')
    ->middleware(AuthenticateMiddleware::class)
    ->controller(ProfileController::class)
    ->group(function () {
        Route::get('/', 'edit')->name('profile.edit');
        Route::put('/', 'update')->name('profile.update');

        Route::get('/finalizar', 'create')->name('profile.create')
            ->middleware(HasNoClientMiddleware::class);
        Route::post('/finalizar', 'store')->name('profile.store')
            ->middleware(HasNoClientMiddleware::class);
    });

Route::prefix('salas')
    ->controller(RoomController::class)
    ->group(function () {
        Route::get('/', 'index')->name('room.index');
        Route::get('/{id}', 'show')->name('room.show');
    });

Route::prefix('salas/{room_id}/pagamento')
    ->controller(PaymentController::class)
    ->group(function () {
        Route::get('/', 'create')->name("payment.create");
        Route::post('/', 'store')->name('payment.store');
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

Route::prefix('reserva')->group(function () {
    Route::get('/detalhes-reserva', function () {
        return view('pages/reserva/detalhes');
    })->name('reserva.detalhes');
});

Route::prefix('avaliar')->controller(EvaluationController::class)->group(function () {
    Route::get('/', 'create')->name('evaluation.create');
    Route::post('/', 'store')->name('evaluation.store');
});





Route::get('/reservas/{id}', function () {
    return view('pages/rent/show');
})->name('rent.show');
