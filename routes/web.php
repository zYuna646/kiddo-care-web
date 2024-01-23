<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelWebController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MainSliderController;
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
});



