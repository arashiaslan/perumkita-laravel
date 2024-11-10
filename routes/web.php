<?php

use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('landing.index');
Route::get('/about', [App\Http\Controllers\LandingController::class, 'about'])->name('landing.about');
Route::get('/features', [App\Http\Controllers\LandingController::class, 'features'])->name('landing.features');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.index');
});

Route::middleware(['auth',AuthAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('/admin/userdata', [AdminController::class, 'user_data'])->name('admin.user.data');
    Route::get('/admin/userdata/{id}/edit', [AdminController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/userdata/{id}', [AdminController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/userdata/delete/{id}', [AdminController::class, 'delete'])->name('admin.user.delete');
});
