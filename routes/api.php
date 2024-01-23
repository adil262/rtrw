<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('aset_warga', \API\AsetWargaController::class);
Route::post(
    'aset_warga/update/{id}',
    [App\Http\Controllers\API\AsetWargaController::class, 'update']
)->name('aset_warga_update');

Route::resource('pengeluaran_kas', \API\PengeluaranKasController::class);
Route::post('/pengeluaran_kas/update/{id}', [App\Http\Controllers\API\PengeluaranKasController::class, 'update'])->name('update');

Route::resource('posyandu', \API\PosyanduControllerr::class);
Route::post(
    '/posyandu/update/{id}',
    [App\Http\Controllers\API\PosyanduControllerr::class, 'update']
)->name('update');

Route::resource('riwayat_iuran', \API\RiwayatIuranController::class);
Route::post(
    '/riwayat_iuran/update/{id}',
    [App\Http\Controllers\API\RiwayatIuranController::class, 'update']
)->name('update');

Route::resource('transaksi_iuran', \API\TransaksiIuranController::class);
Route::post(
    '/transaksi_iuran/update/{id}',
    [App\Http\Controllers\API\TransaksiIuranController::class, 'update']
)->name('update');
Route::resource('datatamu', \API\datatamuController::class);
Route::post(
    '/datatamu/update/{id}',
    [\App\Http\Controllers\API\datatamuController::class, 'update']

)->name('datatamu_update');
Route::resource('jadwalronda', \API\JadwalrondaController::class);
Route::post(
    '/jadwalronda/update/{id}',
    [\App\Http\Controllers\API\JadwalrondaController::class, 'update']
)->name(('update'));

Route::resource('Ronda', \API\RondaController::class);
Route::post(
    '/Ronda/update/{id}',
    [\App\Http\Controllers\API\RondaController::class, 'update']
)->name(('update'));

Route::resource('arsiprtrw', \API\ArsiprtrwController::class);
Route::post(
    '/arsiprtrw/update/{id}',
    [App\Http\Controllers\API\ArsiprtrwController::class, 'update']
)->name('update');
Route::resource('usahawarga', \API\UsahaWargaController::class);
Route::post(
    '/usahawarga/update/{id}',
    [App\Http\Controllers\API\UsahaWargaController::class, 'update']
)->name('update');

Route::resource('wargas', \API\WargasController::class);
Route::post('/wargas/update/{id_warga}', [App\Http\Controllers\API\WargasController::class, 'update'])->name('update');
Route::resource('sarankel', \API\SarankelController::class);
Route::post(
    '/sarankel/update/{id}',
    [App\Http\Controllers\API\SarankelController::class, 'update']
)->name('update');
Route::resource('berita', \API\BeritaController::class);
Route::post(
    '/berita/update/{id}',
    [App\Http\Controllers\API\BeritaController::class, 'update']
)->name('update');

Route::resource('pengajuan_surat', \API\PengajuanSuratController::class);
Route::post(
    '/pengajuan_surat/update/{id}',
    [App\Http\Controllers\API\PengajuanSuratController::class, 'update']
)->name('update');

Route::resource('informasi_warga', \API\InformasiWargaController::class);
Route::post(
    '/informasi_warga/update/{id}',
    [App\Http\Controllers\API\InformasiWargaController::class, 'update']
)->name('update');
