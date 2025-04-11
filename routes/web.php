<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages/salas/salas');
})->name('home');

Route::prefix('auth')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('/registrar', 'create')->name('auth.create');
        Route::post('/registrar', 'store')->name('auth.store');

        Route::get('/login', 'login')->name('auth.login');
        Route::post('/login', 'authenticate')->name('auth.authenticate');

        Route::post('/logout', 'logout')->name('auth.logout');

        Route::get('/finalizar-cadastro', 'finishRegister')
            ->name('auth.finish-register')
            ->middleware(AuthenticateMiddleware::class);
        Route::post('/finalizar-cadastro', 'finishRegisterStore')
            ->name('auth.finish-register.store')
            ->middleware(AuthenticateMiddleware::class);
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
