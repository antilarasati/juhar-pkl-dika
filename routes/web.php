<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PembimbingController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Models\Admin\Pembimbing;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware(['guest'])->group(function () {
    Route::get('/admin/login', [AdminLoginController::class,'login'])->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class,'auth'])->name('admin.auth');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/logout', [AdminLoginController::class,'login'])->name('admin.logout');
    Route::get('/admin/dashboard', [AdminLoginController::class,'auth'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminLoginController::class,'auth'])->name('admin.profile');
    Route::put('/admin/profile', [AdminLoginController::class,'auth'])->name('admin.profile');

    //GURU
    Route::get('/admin/guru', [AdminController::class, 'dashboard'])->name('admin.guru');
    Route::get('/admin/guru/tambah', [AdminController::class, 'layout'])->name('admin.guru.create');
    Route::get('/admin/guru/tambah', [AdminController::class, 'guru'])->name('admin.guru.store');
    Route::get('/admin/guru/delete/{id}', [AdminController::class, 'create'])->name('admin.guru.delete');
    Route::post('/admin/guru/edit/{id}', [AdminController::class, 'store'])->name('admin.guru.edit');
    Route::get('/admin/guru/edit/{id}', [AdminController::class, 'delete'])->name('admin.guru.update');  

    //DUDI
    Route::get('/admin/dudi', [AdminController::class, 'dashboard'])->name('admin.dudi');
    Route::get('/admin/dudi/tambah', [AdminController::class, 'layout'])->name('admin.dudi.create');
    Route::get('/admin/dudi/tambah', [AdminController::class, 'guru'])->name('admin.dudi.store');
    Route::get('/admin/dudi/delete/{id}', [AdminController::class, 'create'])->name('admin.dudi.delete');
    Route::post('/admin/dudi/edit/{id}', [AdminController::class, 'store'])->name('admin.dudi.edit');
    Route::get('/admin/dudi/edit/{id}', [AdminController::class, 'delete'])->name('admin.dudi.update');

    Route::get('/admin/pembimbing', [PembimbingController::class, 'dashboard'])->name('admin_pembimbing');
    Route::get('/admin/pembimbing/tambah', [PembimbingController::class, 'layout'])->name('admin.pembimbing');
    Route::get('/admin/guru', [AdminController::class, 'guru'])->name('admin.guru');
    Route::get('/admin/guru/tambah', [AdminController::class, 'create'])->name('admin.guru.create');
    Route::post('/admin/guru/tambah', [AdminController::class, 'store'])->name('admin.guru.store');
    Route::get('/admin/guru/delete/{id}', [AdminController::class, 'delete'])->name('admin.guru.delete');

});
  