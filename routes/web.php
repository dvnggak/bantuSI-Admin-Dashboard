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

    // Lection Route
    Route::get('/subject/index', [LectionControllers::class, "index"])->name('subject.index');
    Route::get('/subject/create', [LectionControllers::class, "create"])->name('subject.create');
    Route::post('/subject/store', [LectionControllers::class, "store"])->name('subject.store');
    Route::get('/subject/edit/{id}', [LectionControllers::class, "edit"])->name('subject.edit');
    Route::put('/subject/update/{id}', [LectionControllers::class, "update"])->name('subject.update');
    Route::delete('/subject/delete/{id}', [LectionControllers::class, "delete"])->name('subject.delete');
});
