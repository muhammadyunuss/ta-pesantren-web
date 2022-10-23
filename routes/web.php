<?php

use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\PesantrenController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\SantriController;
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

    Route::prefix('manajemen-santri')->group(function () {
        Route::resource('santri',SantriController::class);
        Route::resource('kesehatan',KesehatanController::class);
        Route::resource('prestasi',PrestasiController::class);
        Route::resource('perizinan',PerizinanController::class);
        Route::resource('ekstrakurikuler',EkstrakurikulerController::class);
        Route::resource('pegawai',PegawaiController::class);
        Route::resource('pesantren',PesantrenController::class);
        Route::resource('pelanggaran',PelanggaranController::class);
    });
});

require __DIR__.'/auth.php';
