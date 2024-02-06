<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PuskesmasController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\APIAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/users', [UserController::class, 'register']);
Route::post('/users/check', [UserController::class, 'check']);
Route::post('/users/login', [UserController::class, 'login']);
Route::get('/puskesmas', [PuskesmasController::class, 'getAll']);
Route::post('/puskesmas/id', [PuskesmasController::class, 'getById']);

Route::get('/artikel/kategori', [ArtikelController::class, 'KategoriArtikel']);
Route::post('/artikel/kategori/id', [ArtikelController::class, 'KategoriById']);
Route::get('/artikel', [ArtikelController::class, 'artikel']);

Route::middleware(APIAuth::class)->group(function () {
    Route::get('/users/current', [UserController::class, 'get']);
    Route::post('/users/detail', [UserController::class, 'detailUser']);
    Route::patch('/users/current', [UserController::class, 'update']);
    Route::delete('/users/logout', [UserController::class, 'logout']);
    Route::post('/users/id', [UserController::class, 'id']);
    Route::get('/users/all', [UserController::class, 'all']);

    Route::get('/chat', [UserController::class, 'chat']);
    Route::get('/response', [UserController::class, 'response']);

    Route::post('/puskesmas/masyarakat', [PuskesmasController::class, 'getMasyarakat']);
    Route::post('/puskesmas/anak', [PuskesmasController::class, 'getPuskesmasAnak']);
    Route::post('/masyarakat/anak', [PuskesmasController::class, 'getAnak']);
    Route::post('/anak', [PuskesmasController::class, 'add']);
    Route::post('/pertanyaan', [PuskesmasController::class, 'pertanyaan']);
    Route::post('/jawaban/add', [PuskesmasController::class, 'addjawaban']);
    Route::post('/anak/jawaban', [PuskesmasController::class,'hasiljawaban']);
    Route::post('/anak/hasil/status', [PuskesmasController::class,'hasilstatus']);
    Route::post('/anak/perbarui', [PuskesmasController::class, 'perbarui']);
    Route::post('/anak/pemantauan', [PuskesmasController::class, 'pemantauan']);
    Route::post('/anak/klasifikasi', [PuskesmasController::class, 'klasifikasi']);
    Route::post('/anak/status', [PuskesmasController::class, 'status']);
    Route::post('/anak/log', [PuskesmasController::class, 'getLog']);
    Route::post('/anak/update/status', [PuskesmasController::class, 'updatestatus']);
    Route::post('/anak/update/bantuan', [PuskesmasController::class, 'updatebantuan']);
    Route::post('/anak/update/log', [PuskesmasController::class, 'pemantauan']);
    Route::post('/anak/log/update', [PuskesmasController::class, 'updatelog']);
    Route::post('/anak/delete', [PuskesmasController::class, 'delete']);



});
