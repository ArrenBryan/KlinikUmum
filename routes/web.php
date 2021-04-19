<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\ObatController;
use Illuminate\Support\Facades\Route;

// Routing for Login and Logout
Route::get('/', [UserController::class, 'index_login']);
Route::get('/login', [UserController::class, 'index_login']);
Route::post('/login', [UserController::class, 'check']);
Route::post('/logout', [UserController::class, 'logout']);

// Routing for Administrator
Route::group([
    'middleware' => ['user.check', 'user.role:Administrator'],
], function () {
    Route::get('/pendaftaran-pasien', [PasienController::class, 'index']);
    Route::post('/pendaftaran-pasien/submit', [PasienController::class, 'store']);
    Route::get('/pendaftaran-antrian', [AntrianController::class, 'index_pendaftaran']);
    Route::post('/pendaftaran-antrian/submit', [AntrianController::class, 'store']);
    Route::get('/pendaftaran-akun', [UserController::class, 'index']);
    Route::post('/pendaftaran-akun/submit', [UserController::class, 'store']);
    Route::delete('/daftar-antrian/delete/{no_medrec}', [AntrianController::class, 'delete']);
});

// Routing for Dokter Umum
Route::group([
    'middleware' => ['user.check', 'user.role:Dokter Umum'],
], function () {
    Route::get('/daftar-diagnosa', [DiagnosaController::class, 'index_daftar']);
    Route::post('/daftar-diagnosa/submit/', [DiagnosaController::class, 'store']);
    Route::delete('/daftar-diagnosa/delete/{kode_diagnosa}', [DiagnosaController::class, 'delete']);
    Route::get('/daftar-antrian/update/{no_medrec}', [AntrianController::class, 'update']);
    Route::post('/daftar-antrian/update/put/{no_medrec}', [AntrianController::class, 'put']);
    Route::get('/api/pemeriksaan-pasien/data-dosis/{id_kategori_obat}', [ObatController::class, 'get_data_dosis']);
    Route::get('/api/pemeriksaan-pasien/data-nama-obat', [ObatController::class, 'get_data_namaobat']);
});

// Routing for Apoteker
Route::group([
    'middleware' => ['user.check', 'user.role:Apoteker'],
], function () {
    Route::get('/daftar-obat', [ObatController::class, 'index_daftar']);
    Route::post('/daftar-obat/submit', [ObatController::class, 'store']);
    Route::delete('/daftar-obat/delete/{id_obat}', [ObatController::class, 'delete']);
    Route::post('/daftar-obat/update_obat/{id_obat}', [ObatController::class, 'update']);
    Route::get('/daftar-antrian/show/{no_medrec}', [AntrianController::class, 'show']);
    Route::delete('/daftar-antrian/show/delete/{no_medrec}', [AntrianController::class, 'delete_antrian']);
});

// Routing for Administrator, Dokter Umum, Apoteker and Penanggung Jawab Klinik
Route::group([
    'middleware' => ['user.check', 'user.role:Administrator|Dokter Umum|Apoteker|Penanggung Jawab Klinik'],
], function () {
    Route::get('/daftar-antrian', [AntrianController::class, 'index_list']);
    Route::get('/rekam-medis', [RekamMedisController::class, 'index']);
    Route::get('/api/rekam-medis/datafull/{no_medrec}', [RekamMedisController::class, 'get_data_full']);
    Route::get('/api/rekam-medis/data/{no_medrec}', [RekamMedisController::class, 'get_data']);
});

// Routing for Dokter Umum and Penanggung Jawab Klinik
Route::group([
    'middleware' => ['user.check', 'user.role:Dokter Umum|Penanggung Jawab Klinik'],
], function () {
    Route::get('/laporan-diagnosa', [DiagnosaController::class, 'index_laporan']);
    Route::get('/api/laporan-diagnosa/data/{tanggal}', [DiagnosaController::class, 'get_data']);
});

// Routing for Apoteker and Penanggung Jawab Klinik
Route::group([
    'middleware' => ['user.check', 'user.role:Apoteker|Penanggung Jawab Klinik'],
], function () {
    Route::get('/laporan-obat', [ObatController::class, 'index_laporan']);
});
