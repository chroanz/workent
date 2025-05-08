<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentController;
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

Route::prefix('salas/{room_id}/reservar')
    ->middleware(AuthenticateMiddleware::class)
    ->controller(RentController::class)
    ->group(function () {
        Route::get('/', 'create')->name("rent.create");
        Route::post('/', 'store')->name('rent.store');
    });

Route::prefix('reservas')
    ->middleware(AuthenticateMiddleware::class)
    ->controller(RentController::class)
    ->group(function () {
        Route::get('/{rent_id}', 'show')->name("rent.show");
    });

Route::prefix('reservas/{rent_id}/pagamento')
    ->middleware(AuthenticateMiddleware::class)
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

    Route::prefix('convidados')->controller(GuestController::class)->group(function () {
        Route::get('/', 'index')->name('guest.index');
        Route::get('/{id}', 'show')->name('guest.show');
        Route::post('/', 'store')->name('guest.store');
    });
});

Route::prefix('avaliar')->controller(EvaluationController::class)->group(function () {
    Route::get('/', 'create')->name('evaluation.create');
    Route::post('/', 'store')->name('evaluation.store');
});

Route::get('/salas', function () {
    return view('pages/salas/salas');
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



//Rotas acessiveis por meio da interface
// /auth/registrar
// /auth/login
// /salas/{id}

// Rotas inacessiveis por meio da interface até o momento
// /auth/finalizar-cadastro - Logica ainda não implementada
// /auth/logout             - Botão ainda não criado
// /admin/reservas          - Controller ainda não implementado
// /admin/salas             - Controller ainda não implementado
// /admin/salas/criar       - Controller ainda não implementado
// /admin/pagamentos        - Controller ainda não implementado
// /avaliar                 - Logica de relação ainda não implementada
// /salas                   - Controller ainda não implementado
// /reservas/{id}           - Controller ainda não implementado
// /perfil                  - Controller ainda não implementado

Route::prefix('avaliar')
    ->controller(EvaluationController::class)
    ->group(function () {
        Route::get('/', 'create')->name('evaluation.create');
        Route::post('/', 'store')->name('evaluation.store');
    });
