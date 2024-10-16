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
    Route::get('/admin/logout', [AdminLoginController::class,'logout']);
    Route::get('/admin/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
    
    Route::get('/admin/login', [AdminController::class,'login'])->name('admin.login');
});




