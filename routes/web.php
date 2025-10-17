<?php

use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', [SiteController::class, 'beranda'])->name('beranda');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/visi', [SiteController::class, 'visi'])->name('visi');
Route::get('/login', [SiteController::class, 'login'])->name('login');
