<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware(['guest'])->group(function () {
    Route::get('/admin/login', [AdminLoginController::class,'login'])->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class,'auth'])->name('admin.auth');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/admin/logout', [AdminController::class, 'layout'])->name('admin.layout');
    Route::get('/admin/guru', [AdminController::class, 'guru'])->name('admin.guru');
    Route::get('/admin/guru/tambah', [AdminController::class, 'create'])->name('admin.guru.create');
    Route::post('/admin/guru/tambah', [AdminController::class, 'store'])->name('admin.guru.store');
    Route::get('/admin/guru/delete/{id}', [AdminController::class, 'delete'])->name('admin.guru.delete');
    Route::get('/admin/guru/edit/{id}', [AdminController::class, 'edit'])->name('admin.guru.edit');
    Route::get('/admin/guru/edit/{id}', [AdminController::class, 'update'])->name('admin.guru.update');

    Route::get('/admin/da', [AdminController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/admin/logout', [AdminController::class, 'layout'])->name('admin.layout');
    Route::get('/admin/guru', [AdminController::class, 'guru'])->name('admin.guru');
    Route::get('/admin/guru/tambah', [AdminController::class, 'create'])->name('admin.guru.create');
    Route::post('/admin/guru/tambah', [AdminController::class, 'store'])->name('admin.guru.store');
    Route::get('/admin/guru/delete/{id}', [AdminController::class, 'delete'])->name('admin.guru.delete');
});




