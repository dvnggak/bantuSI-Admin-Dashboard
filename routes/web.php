<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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
});
