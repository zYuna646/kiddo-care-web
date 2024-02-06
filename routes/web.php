<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Anak;
use App\Http\Controllers\ArtikelWebController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MainSliderController;
use App\Http\Controllers\Masyarakat;
use App\Http\Controllers\Petugas;
use App\Http\Controllers\PuskesmasWebController;
use App\Http\Controllers\ReviewSliderController;
use App\Http\Controllers\VideoController;
use App\Http\Middleware\CheckLoggedIn;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'auth'])->name('auth');

Route::middleware(CheckLoggedIn::class)->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/account', [DashboardController::class, 'account'])->name('account-setting');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

    Route::get('/kategori-artikel', [DashboardController::class, 'KategoriArtikel'])->name('KategoriArtikel');
    Route::get('/artikel', [DashboardController::class, 'Artikel'])->name('Artikel');
    Route::get('/puskesmas', [DashboardController::class,'Puskesmas'])->name('Puskesmas');
    Route::get('/admin-puskesmas', [DashboardController::class,'Admin'])->name('Admin');
    Route::get('/masyarakat', [DashboardController::class,'Masyarakat'])->name('Masyarakat');
    Route::get('/petugas', [DashboardController::class,'Petugas'])->name('Petugas');
    Route::get('/anak', [DashboardController::class,'Anak'])->name('Anak');

    Route::get('/kategori-artikel/add', [ArtikelWebController::class, 'create'])->name('admin.KategoriArtikel.create');
    Route::post('/kategori-artikel/store', [ArtikelWebController::class, 'store'])->name('admin.KategoriArtikel.store');
    Route::get('/kategori-artikel/{id}/edit', [ArtikelWebController::class, 'edit'])->name('admin.KategoriArtikel.edit');
    Route::put('/kategori-artikel/{id}/update', [ArtikelWebController::class, 'update'])->name('admin.KategoriArtikel.update');
    Route::delete('/kategori-artikel/{id}/delete', [ArtikelWebController::class, 'destroy'])->name('admin.KategoriArtikel.delete');

    Route::get('/artikel/add', [ArtikelWebController::class, 'Artikelcreate'])->name('admin.artikel.create');
    Route::post('/artikel/store', [ArtikelWebController::class, 'Artikelstore'])->name('admin.artikel.store');
    Route::get('/artikel/{id}/edit', [ArtikelWebController::class, 'Artikeledit'])->name('admin.artikel.edit');
    Route::put('/artikel/{id}/update', [ArtikelWebController::class, 'Artikelupdate'])->name('admin.artikel.update');
    Route::delete('/artikel/{id}/delete', [ArtikelWebController::class, 'Artikeldestroy'])->name('admin.artikel.delete');

    Route::get('/admin/add', [AdminController::class, 'create'])->name('admin.admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.admin.store');
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.admin.edit');
    Route::put('/admin/{id}/update', [AdminController::class, 'update'])->name('admin.admin.update');
    Route::delete('/admin/{id}/delete', [AdminController::class, 'destroy'])->name('admin.admin.delete');

    Route::get('/puskesmas/add/{provinsi_id}/{kabupaten_id}', [PuskesmasWebController::class, 'create'])->name('admin.puskesmas.create');
    Route::get('/puskesmas/add/{provinsi_id}', [PuskesmasWebController::class, 'create'])->name('admin.puskesmas.create');
    Route::get('/puskesmas/add', [PuskesmasWebController::class, 'create'])->name('admin.puskesmas.create');

    Route::post('/puskesmas/store', [PuskesmasWebController::class, 'store'])->name('admin.puskesmas.store');
    Route::get('/puskesmas/{id}/edit', [PuskesmasWebController::class, 'edit'])->name('admin.puskesmas.edit');
    Route::put('/puskesmas/{id}/update', [PuskesmasWebController::class, 'update'])->name('admin.puskesmas.update');
    Route::delete('/puskesmas/{id}/delete', [PuskesmasWebController::class, 'destroy'])->name('admin.puskesmas.delete');



    Route::get('/masyarakat/add', [Masyarakat::class, 'create'])->name('admin.masyarakat.create');
    Route::post('/masyarakat/store', [Masyarakat::class, 'store'])->name('admin.masyarakat.store');
    Route::get('/masyarakat/{id}/edit', [Masyarakat::class, 'edit'])->name('admin.masyarakat.edit');
    Route::put('/masyarakat/{id}/update', [Masyarakat::class, 'update'])->name('admin.masyarakat.update');
    Route::delete('/masyarakat/{id}/delete', [Masyarakat::class, 'destroy'])->name('admin.masyarakat.delete');

    Route::get('/anak/add', [Anak::class, 'create'])->name('admin.anak.create');
    Route::post('/anak/store', [Anak::class, 'store'])->name('admin.anak.store');
    Route::get('/anak/{id}/edit', [Anak::class, 'edit'])->name('admin.anak.edit');
    Route::put('/anak/{id}/update', [Anak::class, 'update'])->name('admin.anak.update');
    Route::delete('/anak/{id}/delete', [Anak::class, 'destroy'])->name('admin.anak.delete');

    Route::get('/petugas/add', [Petugas::class, 'create'])->name('admin.petugas.create');
    Route::post('/petugas/store', [Petugas::class, 'store'])->name('admin.petugas.store');
    Route::get('/petugas/{id}/edit', [Petugas::class, 'edit'])->name('admin.petugas.edit');
    Route::put('/petugas/{id}/update', [Petugas::class, 'update'])->name('admin.petugas.update');
    Route::delete('/petugas/{id}/delete', [Petugas::class, 'destroy'])->name('admin.petugas.delete');
});



