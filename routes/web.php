<?php

use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\DB;

// Route::get('/cek-koneksi', function () {
//     try {
//         DB::connection()->getPdo();
//         return 'Koneksi database berhasil: ' . DB::getDatabaseName();
//     } catch (\Exception $e) {
//         return 'Koneksi gagal: ' . $e->getMessage();
//     }
// });


Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', [SiteController::class, 'beranda'])->name('beranda');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/visi', [SiteController::class, 'visi'])->name('visi');
Route::get('/login', [SiteController::class, 'login'])->name('login');

Route::get('/admin/jenishewan', [App\Http\Controllers\admin\JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
Route::get('/admin/pemilik', [App\Http\Controllers\admin\PemilikController::class, 'index'])->name('admin.pemilik.index');
