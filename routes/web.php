<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvaluationController;
use App\Http\Middleware\HasNoClientMiddleware;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Controllers\EntranceValidationController;

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
        Route::get('/', 'index')->name("rent.index");
        Route::get('/{rent_id}', 'show')->name("rent.show");

        Route::prefix('{rent_id}/pagamento')
            ->controller(PaymentController::class)
            ->group(function () {
                Route::get('/', 'create')->name("payment.create");
                Route::post('/', 'store')->name('payment.store');
            });
    });

Route::prefix('validar-entrada/{rent_id}')
    ->controller(EntranceValidationController::class)
    ->group(function () {
        Route::get('/', 'show')->name("entrance-validation.show");
        Route::post('/', 'validateEntrance')->name('entrance-validation.validate');
    });

Route::prefix('admin')
    ->middleware(AdminMiddleware::class)
    ->group(function () {
        Route::prefix('usuarios')
            ->controller(UserController::class)
            ->group(function () {
                Route::get('/', 'index')->name('user.admin.index');
                Route::get('/criar', 'create')->name('user.admin.create');
                Route::get('/{user_id}/editar', 'edit')->name('user.admin.edit');

                Route::post('/', 'store')->name('user.admin.store');
                Route::put('/{user_id}', 'update')->name('user.admin.update');
            });

        Route::get('/reservas', [RentController::class, 'index'])
            ->name("admin.rent.index");

        Route::prefix('/salas')
            ->controller(RoomController::class)
            ->group(function () {
                Route::get('/', 'adminIndex')->name("admin.room.index");
                Route::get('/criar', 'create')->name("admin.room.create");
                Route::post('/', 'store')->name("admin.room.store");
            });

        Route::prefix('/pagamentos')
            ->controller(PaymentController::class)
            ->group(function () {
                Route::get('/', 'index')->name('admin.payment.index');
            });
    });

Route::prefix('avaliar/{rent_id}')
    ->middleware(AuthenticateMiddleware::class)
    ->controller(EvaluationController::class)
    ->group(function () {
        Route::get('/', 'create')->name('evaluation.create');
        Route::post('/', 'store')->name('evaluation.store');
    });
