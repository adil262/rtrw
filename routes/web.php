<?php


// use App\Http\Controllers\WargasController;

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('aset_warga', AsetWargaController::class);
    Route::resource('pengeluaran_kas', PengeluaranKasController::class);
    Route::resource('posyandu', PosyanduController::class);
    Route::resource('riwayat_iuran', RiwayatIuranController::class);
    Route::resource('transaksi_iuran', TransaksiIuranController::class);
    Route::resource('datatamu', datatamuController::class);
    Route::resource('jadwalronda', jadwalrondaController::class);
    Route::resource('ronda', rondaController::class);
    Route::resource('arsiprtrw', ArsipRtRwController::class);
    Route::resource('usahawarga', UsahaWargaController::class);
    Route::resource('wargas', WargasController::class);
    Route::resource('sarankel', SarankelController::class);
    route::resource('berita', BeritaController::class);
    Route::resource('informasi_warga', Informasi_WargaController::class);
    Route::resource('pengajuan_surat', Pengajuan_SuratController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', function () {
        return view('home');
    });
});
