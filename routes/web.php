<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LectionControllers;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, "login"])->name('login');
Route::post('/login-process', [LoginController::class, "login_process"])->name('login-process');
Route::get('/logout', [LogoutController::class, "logout"])->name('logout');
Route::get('/register', [RegisterController::class, "register"])->name('register');
Route::post('/register-process', [RegisterController::class, "register_process"])->name('register-process');

// Protected Route

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {

    Route::get('/dashboard', [HomeController::class, "dashboard"])->name('dashboard');

    // User Route
    Route::get('/user', [HomeController::class, "index"])->name('index');
    Route::get('/create', [HomeController::class, "create"])->name('user.create');
    Route::get('/edit/{id}', [HomeController::class, "edit"])->name('user.edit');
    Route::put('/update/{id}', [HomeController::class, "update"])->name('user.update');
    Route::delete('/delete/{id}', [HomeController::class, "delete"])->name('user.delete');
    Route::post('/store', [HomeController::class, "store"])->name('user.store');

    // Lection/Subjects Route
    Route::get('/subject/index', [LectionControllers::class, "subjectIndex"])->name('subject.index');
    Route::get('/subject/create', [LectionControllers::class, "subjectCreate"])->name('subject.create');
    Route::post('/subject/store', [LectionControllers::class, "subjectStore"])->name('subject.store');
    Route::get('/subject/edit/{id}', [LectionControllers::class, "subjectEdit"])->name('subject.edit');
    Route::put('/subject/update/{id}', [LectionControllers::class, "subjectUpdate"])->name('subject.update');
    Route::delete('/subject/delete/{id}', [LectionControllers::class, "subjectDelete"])->name('subject.delete');

    // Lection/Skripsi Route
    Route::get('/skripsi/index', [LectionControllers::class, "skripsi_index"])->name('skripsi.index');
    //Lection/Skripsi/Syarat Route
    Route::get('skripsi/syarat/create', [LectionControllers::class, "skripsi_syarat_create"])->name('skripsi.syarat.create');
    Route::post('skripsi/syarat/store', [LectionControllers::class, "skripsi_syarat_store"])->name('skripsi.syarat.store');
    Route::get('skripsi/syarat/edit/{id}', [LectionControllers::class, "skripsi_syarat_edit"])->name('skripsi.syarat.edit');
    Route::put('skripsi/syarat/update/{id}', [LectionControllers::class, "skripsi_syarat_update"])->name('skripsi.syarat.update');
    Route::delete('skripsi/syarat/delete/{id}', [LectionControllers::class, "skripsi_syarat_delete"])->name('skripsi.syarat.delete');
    //Lection/Skripsi/Panduan Route
    Route::get('skripsi/panduan/create', [LectionControllers::class, "skripsi_panduan_create"])->name('skripsi.panduan.create');
    Route::post('skripsi/panduan/store', [LectionControllers::class, "skripsi_panduan_store"])->name('skripsi.panduan.store');
    Route::get('skripsi/panduan/edit/{id}', [LectionControllers::class, "skripsi_panduan_edit"])->name('skripsi.panduan.edit');
    Route::put('skripsi/panduan/update/{id}', [LectionControllers::class, "skripsi_panduan_update"])->name('skripsi.panduan.update');
    Route::delete('skripsi/panduan/delete/{id}', [LectionControllers::class, "skripsi_panduan_delete"])->name('skripsi.panduan.delete');
});
