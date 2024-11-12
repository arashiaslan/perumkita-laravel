<?php

use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComplaintController;

Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('landing.index');
Route::get('/about', [App\Http\Controllers\LandingController::class, 'about'])->name('landing.about');
Route::get('/features', [App\Http\Controllers\LandingController::class, 'features'])->name('landing.features');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.index');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/jadwal-sholat', [UserController::class, 'jadwalSholat'])->name('user.jadwal-sholat');
    Route::get('/artikel', [UserController::class, 'artikel'])->name('user.artikel');
    Route::get('/galeri', [UserController::class, 'galeri'])->name('user.galeri');
    Route::get('/kantin', [UserController::class, 'kantin'])->name('user.kantin');
    Route::get('/pengaduan', [UserController::class, 'pengaduan'])->name('user.pengaduan');
    Route::post('/pengaduan', [UserController::class, 'storePengaduan'])->name('user.pengaduan.store');
    Route::get('/riwayat-pengaduan', [UserController::class, 'riwayatPengaduan'])->name('user.riwayat-pengaduan');
});

Route::middleware(['auth',AuthAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('/admin/userdata', [AdminController::class, 'userData'])->name('admin.user.data');
    Route::get('/admin/userdata/{id}/edit', [AdminController::class, 'editWarga'])->name('admin.user.edit');
    Route::put('/admin/userdata/{id}', [AdminController::class, 'updateWarga'])->name('admin.user.update');
    Route::delete('/admin/userdata/delete/{id}', [AdminController::class, 'deleteWarga'])->name('admin.user.delete');
    Route::get('/admin/complaints', [AdminController::class, 'indexComplaint'])->name('admin.complaints.index');
    Route::get('/admin/artikel', [AdminController::class, 'indexArtikel'])->name('admin.artikel.index');
    Route::get('/admin/galeri', [AdminController::class, 'indexGaleri'])->name('admin.galeri.index');
    Route::get('/admin/kantin', [AdminController::class, 'indexKantin'])->name('admin.kantin.index');
});