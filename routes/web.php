<?php

use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\PesantrenController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('beranda');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::prefix('setting')->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
    });

    Route::prefix('manajemen-santri')->group(function () {
        Route::resource('santri',SantriController::class);
        Route::resource('kesehatan',KesehatanController::class);
        Route::resource('prestasi',PrestasiController::class);
        Route::resource('ekstrakurikuler',EkstrakurikulerController::class);
        Route::resource('perizinan',PerizinanController::class);
        Route::resource('pesantren',PesantrenController::class);
        Route::resource('pelanggaran',PelanggaranController::class);
    });

    Route::prefix('manajemen-pegawai')->group(function () {
        Route::resource('pegawai',PegawaiController::class);
    });

    Route::prefix('manajemen-akademik')->group(function () {
        Route::resource('guru',GuruController::class);
        Route::resource('kelas',KelasController::class);
    });

});

require __DIR__.'/auth.php';
