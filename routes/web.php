<?php

use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    JenisHewanController,
    RasHewanController,
    KategoriController,
    KategoriKlinisController,
    KodeTindakanController,
    PetController,
    RoleController,
    UserController
};
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

Route::get('/admin', [App\Http\Controllers\admin\AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/jenishewan', [App\Http\Controllers\admin\JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
Route::get('/admin/pemilik', [App\Http\Controllers\admin\PemilikController::class, 'index'])->name('admin.pemilik.index');
Route::get('/admin/kategori', [App\Http\Controllers\admin\KategoriController::class, 'index'])->name('admin.kategori.index');
Route::get('/admin/kategori-klinis', [App\Http\Controllers\admin\KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis.index');
Route::get('/admin/pet', [App\Http\Controllers\admin\PetController::class, 'index'])->name('admin.pet.index');
Route::get('/admin/ras', [App\Http\Controllers\admin\RasController::class, 'index'])->name('admin.ras-hewan.index');
Route::get('/admin/kode-tindakan', [App\Http\Controllers\admin\KodeTindakanController::class, 'index'])->name('admin.kode-tindakan.index');
Route::get('/admin/role', [App\Http\Controllers\admin\RoleController::class, 'index'])->name('admin.role.index');
Route::get('/admin/user', [App\Http\Controllers\admin\UserController::class, 'index'])->name('admin.user.index');

