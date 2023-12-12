<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Middleware\SuperAdmin;
use App\Http\Middleware\Admin;

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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes(['verify' => true]);

Route::get('/dashboard/user', [App\Http\Controllers\HomeController::class, 'index'])->name('user')->middleware('verified');
Route::get('/dashboard/user/laporan-pengaduan', [App\Http\Controllers\HomeController::class, 'laporan_pengaduan'])->name('laporan_pengaduan')->middleware('verified');
Route::get('/dashboard/user/laporan-pengaduan/tambah', [App\Http\Controllers\HomeController::class, 'tambah_laporan_pengaduan'])->name('tambah_laporan_pengaduan')->middleware('verified');
Route::post('/dashboard/user/laporan-pengaduan/tambah', [App\Http\Controllers\HomeController::class, 'store_laporan_pengaduan'])->name('store_laporan_pengaduan')->middleware('verified');
Route::get('/dashboard/user/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware('verified');
Route::post('/dashboard/user/profile/update', [App\Http\Controllers\HomeController::class, 'update_profile'])->name('update_profile')->middleware('verified');
Route::get('/dashboard/user/detail-perangkat', [App\Http\Controllers\HomeController::class, 'detail_perangkat'])->name('detail_perangkat')->middleware('verified');
Route::post('/dashboard/user/detail-perangkat/selesai/{id}', [App\Http\Controllers\HomeController::class, 'selesai_detail_perangkat'])->name('selesai_detail_perangkat')->middleware('verified');
Route::get('/dashboard/user/detail-perangkat/tambah', [App\Http\Controllers\HomeController::class, 'tambah_detail_perangkat'])->name('tambah_detail_perangkat')->middleware('verified');
Route::post('/dashboard/user/detail-perangkat/tambah', [App\Http\Controllers\HomeController::class, 'store_detail_perangkat'])->name('store_detail_perangkat')->middleware('verified');


Route::get('/dashboard/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('verified','admin');
Route::get('/dashboard/admin/kelola-pelanggan', [App\Http\Controllers\AdminController::class, 'kelola_pelanggan'])->name('admin_kelola_pelanggan')->middleware('verified','admin');
Route::get('/dashboard/admin/laporan-pengaduan', [App\Http\Controllers\AdminController::class, 'laporan_pengaduan'])->name('admin_laporan_pengaduan')->middleware('verified','admin');
Route::post('/dashboard/admin/laporan-pengaduan/update/proses/{id}', [App\Http\Controllers\AdminController::class, 'update_laporan_pengaduan_proses'])->name('admin_update_laporan_pengaduan_proses')->middleware('verified','admin');
Route::post('/dashboard/admin/laporan-pengaduan/update/selesai/{id}', [App\Http\Controllers\AdminController::class, 'update_laporan_pengaduan_selesai'])->name('admin_update_laporan_pengaduan_selesai')->middleware('verified','admin');
Route::post('/dashboard/admin/kelola-pelanggan/update/tolak/{id}', [App\Http\Controllers\AdminController::class, 'update_kelola_pengguna_tolak'])->name('admin_update_kelola_pengguna_tolak')->middleware('verified','admin');
Route::post('/dashboard/admin/kelola-pelanggan/update/terima/{id}', [App\Http\Controllers\AdminController::class, 'update_kelola_pengguna_terima'])->name('admin_update_kelola_pengguna_terima')->middleware('verified','admin');

Route::get('/dashboard/superadmin', [App\Http\Controllers\SuperAdminController::class, 'index'])->name('superadmin')->middleware('verified','superadmin');
Route::get('/dashboard/superadmin/kelola-admin', [App\Http\Controllers\SuperAdminController::class, 'kelola_admin'])->name('superadmin_kelola_admin')->middleware('verified','superadmin');
Route::get('/dashboard/superadmin/kelola-admin/tambah', [App\Http\Controllers\SuperAdminController::class, 'tambah_admin'])->name('superadmin_tambah_admin')->middleware('verified','superadmin');
Route::post('/dashboard/superadmin/kelola-admin/tambah', [App\Http\Controllers\SuperAdminController::class, 'store_admin'])->name('superadmin_store_admin')->middleware('verified','superadmin');
Route::get('/dashboard/superadmin/kelola-admin/edit/{id}', [App\Http\Controllers\SuperAdminController::class, 'edit_admin'])->name('superadmin_edit_admin')->middleware('verified','superadmin');
Route::post('/dashboard/superadmin/kelola-admin/update/{id}', [App\Http\Controllers\SuperAdminController::class, 'update_admin'])->name('superadmin_update_admin')->middleware('verified','superadmin');
Route::get('/dashboard/superadmin/kelola-admin/delete/{id}', [App\Http\Controllers\SuperAdminController::class, 'delete_admin'])->name('superadmin_delete_admin')->middleware('verified','superadmin');
Route::get('/dashboard/superadmin/kelola-pelanggan', [App\Http\Controllers\SuperAdminController::class, 'kelola_pelanggan'])->name('superadmin_kelola_pelanggan')->middleware('verified','superadmin');
Route::get('/dashboard/superadmin/laporan-pengaduan', [App\Http\Controllers\SuperAdminController::class, 'laporan_pengaduan'])->name('superadmin_laporan_pengaduan')->middleware('verified','superadmin');
Route::post('/dashboard/superadmin/laporan-pengaduan/update/proses/{id}', [App\Http\Controllers\SuperAdminController::class, 'update_laporan_pengaduan_proses'])->name('superadmin_update_laporan_pengaduan_proses')->middleware('verified','superadmin');
Route::post('/dashboard/superadmin/laporan-pengaduan/update/selesai/{id}', [App\Http\Controllers\SuperAdminController::class, 'update_laporan_pengaduan_selesai'])->name('superadmin_update_laporan_pengaduan_selesai')->middleware('verified','superadmin');
Route::post('/dashboard/superadmin/kelola-pelanggan/update/tolak/{id}', [App\Http\Controllers\SuperAdminController::class, 'update_kelola_pengguna_tolak'])->name('superadmin_update_kelola_pengguna_tolak')->middleware('verified','superadmin');
Route::post('/dashboard/superadmin/kelola-pelanggan/update/terima/{id}', [App\Http\Controllers\SuperAdminController::class, 'update_kelola_pengguna_terima'])->name('superadmin_update_kelola_pengguna_terima')->middleware('verified','superadmin');

