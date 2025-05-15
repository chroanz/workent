<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EntranceValidationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RoomController;
use App\Http\Middleware\AdminMiddleware;
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
        Route::get('/', 'index')->name("rent.index");
        Route::get('/{rent_id}', 'show')->name("rent.show");
    });

Route::prefix('reservas/{rent_id}/avaliar')
   ->middleware(AuthenticateMiddleware::class)
   ->controller(EvaluationController::class)
   ->group(function () {
       Route::get('/', 'create')->name('evaluation.create');
       Route::post('/', 'store')->name('evaluation.store');
   });


Route::prefix('reservas/{rent_id}/pagamento')
    ->middleware(AuthenticateMiddleware::class)
    ->controller(PaymentController::class)
    ->group(function () {
        Route::get('/', 'create')->name("payment.create");
        Route::post('/', 'store')->name('payment.store');
    });

Route::prefix('validar-entrada/{rent_id}')
    ->controller(EntranceValidationController::class)
    ->group(function () {
        Route::get('/', 'show')->name("entrance-validation.show");
        Route::post('/', 'validateEntrance')->name('entrance-validation.validate');
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

Route::prefix('funcionarios')
    ->middleware(AdminMiddleware::class)
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('/', 'employeeList')->name('employees.list');
        Route::get('/criar', 'employeeCreate')->name('employees.create');
        Route::get('/{employee}/editar', 'employeeEdit')->name('employees.edit');
        Route::get('/{employee}', 'employeeShow')->name('employees.show');

        Route::post('/', 'employeeStore')->name('employees.store');
        Route::put('/{employee}', 'employeeUpdate')->name('employees.update');
        Route::delete('/{employee}', 'employeeDestroy')->name('employees.destroy');
});