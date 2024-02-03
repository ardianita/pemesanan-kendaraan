<?php

use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\TransportationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/persetujuan', [PersetujuanController::class, 'index'])->name('persetujuan');
    Route::put('/persetujuan-disetujui/{idPemesanan}', [PersetujuanController::class, 'persetujuan_disetujui'])->name('persetujuan-success');
    Route::put('/persetujuan-ditolak/{idPemesanan}', [PersetujuanController::class, 'persetujuan_ditolak'])->name('persetujuan-failed');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::prefix('admin/drivers')->controller(DriverController::class)->name('drivers.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{idDriver}/edit', 'edit')->name('edit');
        Route::put('/{idDriver}', 'update')->name('update');
        Route::delete('/{idDriver}', 'destroy')->name('destroy');
    });

    Route::prefix('admin/transportations')->controller(TransportationController::class)->name('transportations.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{idTransportation}/edit', 'edit')->name('edit');
        Route::put('/{idTransportation}', 'update')->name('update');
        Route::delete('/{idTransportation}', 'destroy')->name('destroy');
    });

    Route::prefix('admin/pemesanan')->controller(PemesananController::class)->name('pemesanan.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{idPemesanan}/edit', 'edit')->name('edit');
        Route::put('/{idPemesanan}', 'update')->name('update');
        Route::delete('/{idPemesanan}', 'destroy')->name('destroy');
    });
});
