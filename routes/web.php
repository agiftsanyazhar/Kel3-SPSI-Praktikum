<?php

use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\Dashboard_IndexController;
use App\Http\Controllers\DetailPenjadwalanSidangController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PendaftaranSidangController;
use App\Http\Controllers\PenjadwalanSidangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\Detail_Penjadwalan_Sidang;
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

//================================================================================
//===================================== Index =====================================
//================================================================================
Route::get('/', [IndexController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);

//================================================================================
//================================== Dashboard ===================================
//================================================================================
Route::get('/dashboard-index', [Dashboard_IndexController::class, 'index'])->middleware('auth');
Route::get('/maps', [MapsController::class, 'index'])->middleware('auth');
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/nilai-table', [NilaiController::class, 'index'])->middleware('auth');
Route::get('/dosen-table', [DosenController::class, 'index'])->middleware('auth');
Route::get('/bimbingan-table', [BimbinganController::class, 'index'])->middleware('auth');
Route::get('/mahasiswa-table', [MahasiswaController::class, 'index'])->middleware('auth');
Route::get('/sidang-table', [PendaftaranSidangController::class, 'index'])->middleware('auth');
Route::get('/penjadwalan-sidang-table', [PenjadwalanSidangController::class, 'index'])->middleware('auth');

//================================================================================
//=================================== Register ===================================
//================================================================================
Route::post('/register', [RegisterController::class, 'store']);

//================================================================================
//===================================== Login & Logout ===========================
//================================================================================
Route::post('/login', [IndexController::class, 'authenticate']);
Route::post('/logout', [IndexController::class, 'logout']);

//================================================================================
//===================================== CRUD =====================================
//================================================================================
//Nilai
Route::get('/form-create-nilai', [NilaiController::class, 'create'])->middleware('auth');
Route::post('/create-nilai', [NilaiController::class, 'store'])->middleware('auth');
Route::get('/form-edit-nilai-{id}', [NilaiController::class, 'edit'])->middleware('auth');
Route::put('/update-nilai-{id}', [NilaiController::class, 'update'])->middleware('auth');
Route::get('nilai-table-penjadwalan-sidang-{id}', [PenjadwalanSidangController::class, 'index'])->middleware('auth');
Route::delete('/delete-nilai-{id}', [NilaiController::class, 'destroy'])->middleware('auth');

//Dosen
Route::get('/form-create-dosen', [DosenController::class, 'create'])->middleware('auth');
Route::post('/create-dosen', [DosenController::class, 'store'])->middleware('auth');
Route::get('/form-edit-dosen-{id}', [DosenController::class, 'edit'])->middleware('auth');
Route::put('/update-dosen-{id}', [DosenController::class, 'update'])->middleware('auth');
Route::delete('/delete-dosen-{id}', [DosenController::class, 'destroy'])->middleware('auth');

//Sidang
Route::get('/mahasiswa-table-sidang-{id}', [PendaftaranSidangController::class, 'index'])->middleware('auth');
Route::get('/form-create-sidang', [PendaftaranSidangController::class, 'create'])->middleware('auth');
Route::post('/create-sidang', [PendaftaranSidangController::class, 'store'])->middleware('auth');
Route::get('/form-edit-sidang-{id}', [PendaftaranSidangController::class, 'edit'])->middleware('auth');
Route::put('/update-sidang-{id}', [PendaftaranSidangController::class, 'update'])->middleware('auth');
Route::delete('/delete-sidang-{id}', [PendaftaranSidangController::class, 'destroy'])->middleware('auth');

//Penjadwalan Sidang
Route::get('/form-create-penjadwalan-sidang-{id}', [PenjadwalanSidangController::class, 'create'])->middleware('auth');
Route::post('/create-penjadwalan-sidang-{id}', [PenjadwalanSidangController::class, 'store'])->middleware('auth');
Route::get('/form-edit-penjadwalan-sidang-{id}', [PenjadwalanSidangController::class, 'edit'])->middleware('auth');
Route::put('/update-penjadwalan-sidang-{id}', [PenjadwalanSidangController::class, 'update'])->middleware('auth');
Route::delete('/delete-penjadwalan-sidang-{id}', [PenjadwalanSidangController::class, 'destroy'])->middleware('auth');

//Detail Penjadwalan Sidang
Route::get('/detail-penjadwalan-sidang-{id}', [DetailPenjadwalanSidangController::class, 'index'])->middleware('auth');
Route::get('/form-create-detail-penjadwalan-sidang-{id}', [DetailPenjadwalanSidangController::class, 'create'])->middleware('auth');
Route::post('/create-detail-penjadwalan-sidang-{id}', [DetailPenjadwalanSidangController::class, 'store'])->middleware('auth');
Route::get('/form-edit-detail-penjadwalan-sidang-{id}', [DetailPenjadwalanSidangController::class, 'edit'])->middleware('auth');
Route::put('/update-detail-penjadwalan-sidang-{id}', [DetailPenjadwalanSidangController::class, 'update'])->middleware('auth');
Route::delete('/delete-detail-penjadwalan-sidang-{id}', [DetailPenjadwalanSidangController::class, 'destroy'])->middleware('auth');