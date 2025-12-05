<?php

use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\dokter\{DashboardDokterController,
    RekamMedisDokterController
    };
use App\Http\Controllers\perawat\{DashboardPerawatController,
    RekamMedisPerawatController
    };
use App\Http\Controllers\pemilik\DashboardPemilikController;
use App\Http\Controllers\resepsionis\{DashboardResepsionisController,
    ResepsionisPendaftaranController,
    ResepsionisTemuDokterController
    };
use App\Http\Controllers\Admin\{
    JenisHewanController,
    RasController,
    KategoriController,
    KategoriKlinisController,
    KodeTindakanController,
    PetController,
    RoleController,
    UserController,
    PerawatController,
    DokterController
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
    return view('/site/beranda');
});

Route::get('/beranda', [SiteController::class, 'beranda'])->name('beranda');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/visi', [SiteController::class, 'visi'])->name('visi');

// Route::get('/admin', [App\Http\Controllers\admin\AdminController::class, 'index'])->name('admin.dashboard');
// Route::get('/admin/jenishewan', [App\Http\Controllers\admin\JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
// Route::get('/admin/pemilik', [App\Http\Controllers\admin\PemilikController::class, 'index'])->name('admin.pemilik.index');
// Route::get('/admin/kategori', [App\Http\Controllers\admin\KategoriController::class, 'index'])->name('admin.kategori.index');
// Route::get('/admin/kategori-klinis', [App\Http\Controllers\admin\KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis.index');
// Route::get('/admin/pet', [App\Http\Controllers\admin\PetController::class, 'index'])->name('admin.pet.index');
// Route::get('/admin/ras', [App\Http\Controllers\admin\RasController::class, 'index'])->name('admin.ras-hewan.index');
// Route::get('/admin/kode-tindakan', [App\Http\Controllers\admin\KodeTindakanController::class, 'index'])->name('admin.kode-tindakan.index');
// Route::get('/admin/role', [App\Http\Controllers\admin\RoleController::class, 'index'])->name('admin.role.index');
// Route::get('/admin/user', [App\Http\Controllers\admin\UserController::class, 'index'])->name('admin.user.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['isAdministrator'])->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index']) ->name('admin.dashboard');
    Route::get('/admin/jenishewan', [JenisHewanController::class, 'index'])->name('admin.JenisHewan.index');
    Route::get('/admin/jenishewan/create', [JenisHewanController::class, 'create'])->name('admin.JenisHewan.create');
    Route::post('/admin/jenishewan/store', [JenisHewanController::class, 'store'])->name('admin.JenisHewan.store');
    Route::get('/admin/jenishewan/{id}/edit', [JenisHewanController::class, 'edit'])->name('admin.JenisHewan.edit');
    Route::put('/admin/jenishewan/{id}', [JenisHewanController::class, 'update'])->name('admin.JenisHewan.update');
    Route::delete('/admin/jenishewan/{id}', [JenisHewanController::class, 'destroy'])->name('admin.JenisHewan.destroy');

    Route::get('/admin/ras', [RasController::class, 'index'])->name('admin.RasHewan.index');
    Route::get('/admin/ras/create', [RasController::class, 'create'])->name('admin.RasHewan.create');
    Route::post('/admin/ras/store', [RasController::class, 'store'])->name('admin.RasHewan.store');
    Route::get('/admin/ras/edit/{id}', [RasController::class, 'edit'])->name('admin.RasHewan.edit');
    Route::put('/admin/ras/update/{id}', [RasController::class, 'update'])->name('admin.RasHewan.update');
    Route::delete('/admin/ras/destroy/{id}', [RasController::class, 'destroy'])->name('admin.RasHewan.destroy');

    Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/admin/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/admin/kategori/store', [KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/admin/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/admin/kategori/{id}/update', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/admin/kategori/{id}/destroy', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');

    Route::get('/admin/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('admin.KategoriKlinis.index');
    Route::get('/admin/kategori-klinis/create', [KategoriKlinisController::class, 'create'])->name('admin.KategoriKlinis.create');
    Route::post('/admin/kategori-klinis/store', [KategoriKlinisController::class, 'store'])->name('admin.KategoriKlinis.store');
    Route::get('/admin/kategori-klinis/{id}/edit', [KategoriKlinisController::class, 'edit'])->name('admin.KategoriKlinis.edit');
    Route::put('/admin/kategori-klinis/{id}/update', [KategoriKlinisController::class, 'update'])->name('admin.KategoriKlinis.update');
    Route::delete('/admin/kategori-klinis/{id}/destroy', [KategoriKlinisController::class, 'destroy'])->name('admin.KategoriKlinis.destroy');

    Route::get('/admin/kode-tindakan', [KodeTindakanController::class, 'index'])->name('admin.KodeTindakan.index');
    Route::get('/admin/kode-tindakan/create', [KodeTindakanController::class, 'create'])->name('admin.KodeTindakan.create');
    Route::post('/admin/kode-tindakan/store', [KodeTindakanController::class, 'store'])->name('admin.KodeTindakan.store');
    Route::get('/admin/kode-tindakan/{id}/edit', [KodeTindakanController::class, 'edit'])->name('admin.KodeTindakan.edit');
    Route::put('/admin/kode-tindakan/{id}/update', [KodeTindakanController::class, 'update'])->name('admin.KodeTindakan.update');
    Route::delete('/admin/kode-tindakan/{id}/destroy', [KodeTindakanController::class, 'destroy'])->name('admin.KodeTindakan.destroy');

    Route::get('/admin/pet', [PetController::class, 'index'])->name('admin.Pet.index');
    Route::get('/admin/pet/create', [PetController::class, 'create'])->name('admin.Pet.create');
    Route::post('/admin/pet/store', [PetController::class, 'store'])->name('admin.Pet.store');
    Route::get('/admin/pet/{id}/edit', [PetController::class, 'edit'])->name('admin.Pet.edit');
    Route::put('/admin/pet/{id}', [PetController::class, 'update'])->name('admin.Pet.update');
    Route::delete('/admin/pet/{id}', [PetController::class, 'destroy'])->name('admin.Pet.destroy');

    Route::get('/admin/role', [RoleController::class, 'index'])->name('admin.Role.index');
    Route::get('/admin/role/create', [RoleController::class, 'create'])->name('admin.Role.create');
    Route::post('/admin/role/store', [RoleController::class, 'store'])->name('admin.Role.store');
    Route::get('/admin/role/{id}/edit', [RoleController::class, 'edit'])->name('admin.Role.edit');
    Route::put('/admin/role/{id}/update', [RoleController::class, 'update'])->name('admin.Role.update');
    Route::delete('/admin/role/{id}/destroy', [RoleController::class, 'destroy'])->name('admin.Role.destroy');

    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.User.index');
    Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.User.create');
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.User.store');
    Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->name('admin.User.edit');
    Route::put('/admin/user/{id}/update', [UserController::class, 'update'])->name('admin.User.update');
    Route::delete('/admin/user/{id}/destroy', [UserController::class, 'destroy'])->name('admin.User.destroy');

    Route::prefix('admin/perawat')->name('admin.perawat.')->group(function () {
        Route::get('/', [PerawatController::class, 'index'])->name('index');
        Route::get('/create', [PerawatController::class, 'create'])->name('create');
        Route::post('/store', [PerawatController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PerawatController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [PerawatController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [PerawatController::class, 'destroy'])->name('destroy');
    });

    Route::get('/admin/dokter', [DokterController::class, 'index'])->name('admin.dokter.index');
    Route::get('/admin/dokter/create', [DokterController::class, 'create'])->name('admin.dokter.create');
    Route::post('/admin/dokter/store', [DokterController::class, 'store'])->name('admin.dokter.store');
    Route::get('/admin/dokter/{id}/edit', [DokterController::class, 'edit'])->name('admin.dokter.edit');
    Route::put('/admin/dokter/{id}', [DokterController::class, 'update'])->name('admin.dokter.update');
    Route::delete('/admin/dokter/{id}', [DokterController::class, 'destroy'])->name('admin.dokter.destroy');
    
});

Route::middleware(['isResepsionis'])->group(function () {
    Route::get('/resepsionis/dashboard', [DashboardResepsionisController::class, 'index'])
        ->name('resepsionis.dashboard');

    // REGISTRASI PEMILIK & PET
Route::get('/resepsionis/Pendaftaran', 
    [ResepsionisPendaftaranController::class, 'index'])
->name('resepsionis.Pendaftaran.index');

/** Pemilik */
    Route::get('/resepsionis/Pendaftaran/pemilik/tambah',
        [ResepsionisPendaftaranController::class, 'createPemilik'])
        ->name('resepsionis.Pendaftaran.createPemilik');

    Route::post('/resepsionis/Pendaftaran/pemilik/store',
        [ResepsionisPendaftaranController::class, 'storePemilik'])
        ->name('resepsionis.Pendaftaran.storePemilik');

    /** Pet */
    Route::get('/resepsionis/Pendaftaran/pet/tambah',
        [ResepsionisPendaftaranController::class, 'createPet'])
        ->name('resepsionis.Pendaftaran.createPet');

    Route::post('/resepsionis/Pendaftaran/pet/store',
        [ResepsionisPendaftaranController::class, 'storePet'])
        ->name('resepsionis.Pendaftaran.storePet');
  

    Route::get('/resepsionis/temu-dokter', [ResepsionisTemuDokterController::class, 'index'])
        ->name('resepsionis.TemuDokter.index');

    Route::get('/resepsionis/temu-dokter/tambah', [ResepsionisTemuDokterController::class, 'create'])
        ->name('resepsionis.TemuDokter.tambah');

    Route::post('/resepsionis/temu-dokter/store', [ResepsionisTemuDokterController::class, 'store'])
        ->name('resepsionis.TemuDokter.store');
});


Route::middleware(['isDokter'])->group(function () {
    Route::get('/dokter/dashboard', [App\Http\Controllers\dokter\DashboardDokterController::class, 'index'])
        ->name('dokter.dashboard');

    Route::get('/dokter/rekam-medis', [App\Http\Controllers\dokter\RekamMedisDokterController::class, 'index'])
        ->name('dokter.RekamMedis.index');

    Route::get('/dokter/rekam-medis/{id}', [App\Http\Controllers\dokter\RekamMedisDokterController::class, 'show'])
        ->name('dokter.RekamMedis.show');
});

Route::middleware(['isPerawat'])->group(function () {
    Route::get('/perawat/dashboard', [App\Http\Controllers\perawat\DashboardPerawatController::class, 'index'])
        ->name('perawat.dashboard');

    Route::get('/perawat/rekam-medis', [App\Http\Controllers\perawat\RekamMedisPerawatController::class, 'index'])
        ->name('perawat.RekamMedis.index');

    Route::get('/perawat/rekam-medis', 
        [RekamMedisPerawatController::class, 'index'])->name('perawat.RekamMedis.index');

    Route::get('/perawat/rekam-medis/create', 
        [RekamMedisPerawatController::class, 'create'])->name('perawat.RekamMedis.create');

    Route::post('/perawat/rekam-medis/store', 
        [RekamMedisPerawatController::class, 'store'])->name('perawat.RekamMedis.store');
});

Route::middleware(['isPemilik'])->group(function () {
    Route::get('/pemilik/dashboard', [DashboardPemilikController::class, 'index']) ->name('pemilik.dashboard');
});