<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\ClassGuruController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\JurnalSiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KelasGuruController;
use App\Http\Controllers\KelasSiswaController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\UserController;
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

Route::post('useradd', [UserController::class, 'store']);
Route::get('user/{id}', [UserController::class, 'show']);
Route::get('users', [UserController::class, 'index']);
Route::get('user-search', [UserController::class, 'search']);
Route::put('user/{id}', [UserController::class, 'update']);
Route::delete('user/{id}', [UserController::class, 'destroy']);

Route::post('kelasadd', [KelasController::class, 'store']);
Route::get('kelas/{id}', [KelasController::class, 'show']);
Route::get('kelass', [KelasController::class, 'index']);
Route::get('kelas-search', [KelasController::class, 'search']);
Route::put('kelas/{id}', [KelasController::class, 'update']);
Route::delete('kelas/{id}', [KelasController::class, 'destroy']);

Route::post('jurnal_siswaadd', [JurnalSiswaController::class, 'store']);
Route::get('jurnal_siswa/{id}', [JurnalSiswaController::class, 'show']);
Route::get('jurnal_siswas', [JurnalSiswaController::class, 'index']);
Route::get('jurnal_siswa-search', [JurnalSiswaController::class, 'search']);
Route::put('jurnal_siswa/{id}', [JurnalSiswaController::class, 'update']);
Route::delete('jurnal_siswa/{id}', [JurnalSiswaController::class, 'destroy']);

Route::post('kelas_siswaadd', [KelasSiswaController::class, 'store']);
Route::get('kelas_siswa/{id}', [KelasSiswaController::class, 'show']);
Route::get('kelas_siswas', [KelasSiswaController::class, 'index']);
Route::get('kelas_siswa-search', [KelasSiswaController::class, 'search']);
Route::put('kelas_siswa/{id}', [KelasSiswaController::class, 'update']);
Route::delete('kelas_siswa/{id}', [KelasSiswaController::class, 'destroy']);

Route::post('class_guruadd', [ClassGuruController::class, 'store']);
Route::get('class_guru/{id}', [ClassGuruController::class, 'show']);
Route::get('class_gurus', [ClassGuruController::class, 'index']);
Route::get('class_guru-search', [ClassGuruController::class, 'search']);
Route::put('class_guru/{id}', [ClassGuruController::class, 'update']);
Route::delete('class_guru/{id}', [ClassGuruController::class, 'destroy']);

Route::post('guruadd', [GuruController::class, 'store']);
Route::get('guru/{id}', [GuruController::class, 'show']);
Route::get('gurus', [GuruController::class, 'index']);
Route::get('guru-search', [GuruController::class, 'search']);
Route::put('guru/{id}', [GuruController::class, 'update']);
Route::delete('guru/{id}', [GuruController::class, 'destroy']);

Route::post('muridadd', [MuridController::class, 'store']);
Route::get('murid/{id}', [MuridController::class, 'show']);
Route::get('murids', [MuridController::class, 'index']);
Route::get('murid-search', [MuridController::class, 'search']);
Route::put('murid/{id}', [MuridController::class, 'update']);
Route::delete('murid/{id}', [MuridController::class, 'destroy']);

Route::post('login', [LoginController::class, 'login']);
