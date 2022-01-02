<?php

use App\Http\Controllers\Dashboard_IndexController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PendaftaranSidangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
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
Route::get('/dashboard-index', [Dashboard_IndexController::class, 'index']);
Route::get('/maps', [MapsController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/nilai-table', [NilaiController::class, 'index']);
Route::get('/dosen-table', [DosenController::class, 'index']);

//================================================================================
//=================================== Register ===================================
//================================================================================
Route::post('/register', [RegisterController::class, 'store']);
// Route::delete('/delete-santri-{id}', [RegisterController::class, 'destroy']);

//================================================================================
//===================================== Login & Logout ===========================
//================================================================================
Route::post('/login', [IndexController::class, 'authenticate']);
Route::post('/logout', [IndexController::class, 'logout']);

//================================================================================
//===================================== CRUD =====================================
//================================================================================
//Sidang
Route::get('/form-create-sidang', [PendaftaranSidangController::class, 'create']);
Route::post('/create-sidang', [PendaftaranSidangController::class, 'store']);

//Dosen
Route::get('/form-create-dosen', [DosenController::class, 'createDaftarDosen']);