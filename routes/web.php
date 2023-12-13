<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LectionControllers;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MajoringProfileController;
use App\Http\Controllers\PaymentGuideController;
use App\Http\Controllers\PaymentScheduleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentsController;
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
    //Lection/Skripsi/Pengumuman Route
    Route::get('skripsi/pengumuman/create', [LectionControllers::class, "skripsi_pengumuman_create"])->name('skripsi.pengumuman.create');
    Route::post('skripsi/pengumuman/store', [LectionControllers::class, "skripsi_pengumuman_store"])->name('skripsi.pengumuman.store');
    Route::get('skripsi/pengumuman/edit/{id}', [LectionControllers::class, "skripsi_pengumuman_edit"])->name('skripsi.pengumuman.edit');
    Route::put('skripsi/pengumuman/update/{id}', [LectionControllers::class, "skripsi_pengumuman_update"])->name('skripsi.pengumuman.update');
    Route::delete('skripsi/pengumuman/delete/{id}', [LectionControllers::class, "skripsi_pengumuman_delete"])->name('skripsi.pengumuman.delete');
    //Lection/Skripsi/File Route
    Route::get('skripsi/file/create', [LectionControllers::class, "skripsi_file_create"])->name('skripsi.file.create');
    Route::post('skripsi/file/store', [LectionControllers::class, "skripsi_file_store"])->name('skripsi.file.store');
    Route::get('skripsi/file/edit/{id}', [LectionControllers::class, "skripsi_file_edit"])->name('skripsi.file.edit');
    Route::put('skripsi/file/update/{id}', [LectionControllers::class, "skripsi_file_update"])->name('skripsi.file.update');
    Route::delete('skripsi/file/delete/{id}', [LectionControllers::class, "skripsi_file_delete"])->name('skripsi.file.delete');

    // Lection/Kerja Praktek Route
    Route::get('/internship/requisite/index', [LectionControllers::class, "internship_requisite_index"])->name('internship.requisite.index');
    Route::get('/internship/requisite/create', [LectionControllers::class, "internship_requisite_create"])->name('internship.requisite.create');
    Route::post('/internship/requisite/store', [LectionControllers::class, "internship_requisite_store"])->name('internship.requisite.store');
    Route::get('/internship/requisite/edit/{code}', [LectionControllers::class, "internship_requisite_edit"])->name('internship.requisite.edit');
    Route::put('/internship/requisite/update/{code}', [LectionControllers::class, "internship_requisite_update"])->name('internship.requisite.update');
    Route::delete('/internship/requisite/delete/{code}', [LectionControllers::class, "internship_requisite_delete"])->name('internship.requisite.delete');

    // Students Route
    Route::get('/student/index', [StudentsController::class, "index"])->name('student.index');
    Route::get('/student/create', [StudentsController::class, "create"])->name('student.create');
    Route::post('/student/store', [StudentsController::class, "store"])->name('student.store');
    Route::get('/student/edit/{nim}', [StudentsController::class, "edit"])->name('student.edit');
    Route::put('/student/update/{nim}', [StudentsController::class, "update"])->name('student.update');
    Route::delete('/student/delete/{nim}', [StudentsController::class, "delete"])->name('student.delete');

    // Academic Files Route
    Route::get('/file/index', [FileController::class, "index"])->name('file.index');
    Route::get('/file/create', [FileController::class, "create"])->name('file.create');
    Route::post('/file/store', [FileController::class, "store"])->name('file.store');
    Route::get('/file/edit/{code}', [FileController::class, "edit"])->name('file.edit');
    Route::put('/file/update/{code}', [FileController::class, "update"])->name('file.update');
    Route::delete('/file/delete/{code}', [FileController::class, "delete"])->name('file.delete');

    // Announcement Route
    Route::get('/announcement/index', [AnnouncementController::class, "index"])->name('announcement.index');
    Route::get('/announcement/create', [AnnouncementController::class, "create"])->name('announcement.create');
    Route::post('/announcement/store', [AnnouncementController::class, "store"])->name('announcement.store');
    Route::get('/announcement/edit/{code}', [AnnouncementController::class, "edit"])->name('announcement.edit');
    Route::put('/announcement/update/{code}', [AnnouncementController::class, "update"])->name('announcement.update');
    Route::delete('/announcement/delete/{code}', [AnnouncementController::class, "delete"])->name('announcement.delete');

    // Payment Guide Route
    Route::get('/payment/guide/index', [PaymentGuideController::class, "payment_guide_index"])->name('payment.guide.index');
    Route::get('/payment/guide/create', [PaymentGuideController::class, "payment_guide_create"])->name('payment.guide.create');
    Route::post('/payment/guide/store', [PaymentGuideController::class, "payment_guide_store"])->name('payment.guide.store');
    Route::get('/payment/guide/edit/{id}', [PaymentGuideController::class, "payment_guide_edit"])->name('payment.guide.edit');
    Route::put('/payment/guide/update/{id}', [PaymentGuideController::class, "payment_guide_update"])->name('payment.guide.update');
    Route::delete('/payment/guide/delete/{id}', [PaymentGuideController::class, "payment_guide_delete"])->name('payment.guide.delete');

    // Payment Schedule Route
    Route::get('/payment/schedule/index', [PaymentScheduleController::class, "payment_schedule_index"])->name('payment.schedule.index');
    Route::get('/payment/schedule/create', [PaymentScheduleController::class, "payment_schedule_create"])->name('payment.schedule.create');
    Route::post('/payment/schedule/store', [PaymentScheduleController::class, "payment_schedule_store"])->name('payment.schedule.store');
    Route::get('/payment/schedule/edit/{id}', [PaymentScheduleController::class, "payment_schedule_edit"])->name('payment.schedule.edit');
    Route::put('/payment/schedule/update/{id}', [PaymentScheduleController::class, "payment_schedule_update"])->name('payment.schedule.update');
    Route::delete('/payment/schedule/delete/{id}', [PaymentScheduleController::class, "payment_schedule_delete"])->name('payment.schedule.delete');

    // Majoring Profile Route
    Route::get('/majoring/profile/index', [MajoringProfileController::class, "majoring_profile_index"])->name('majoring.profile.index');
    Route::get('/majoring/profile/create', [MajoringProfileController::class, "majoring_profile_create"])->name('majoring.profile.create');
    Route::post('/majoring/profile/store', [MajoringProfileController::class, "majoring_profile_store"])->name('majoring.profile.store');
    Route::get('/majoring/profile/edit/{id}', [MajoringProfileController::class, "majoring_profile_edit"])->name('majoring.profile.edit');
    Route::put('/majoring/profile/update/{id}', [MajoringProfileController::class, "majoring_profile_update"])->name('majoring.profile.update');
    Route::delete('/majoring/profile/delete/{id}', [MajoringProfileController::class, "majoring_profile_delete"])->name('majoring.profile.delete');

    // Majoring Lecturers Route
    Route::get('/majoring/lecturers/index', [LecturerController::class, "majoring_lecturers_index"])->name('majoring.lecturers.index');
    Route::get('/majoring/lecturers/create', [LecturerController::class, "majoring_lecturers_create"])->name('majoring.lecturers.create');
    Route::post('/majoring/lecturers/store', [LecturerController::class, "majoring_lecturers_store"])->name('majoring.lecturers.store');
    Route::get('/majoring/lecturers/edit/{nik}', [LecturerController::class, "majoring_lecturers_edit"])->name('majoring.lecturers.edit');
    Route::put('/majoring/lecturers/update/{nik}', [LecturerController::class, "majoring_lecturers_update"])->name('majoring.lecturers.update');
    Route::delete('/majoring/lecturers/delete/{nik}', [LecturerController::class, "majoring_lecturers_delete"])->name('majoring.lecturers.delete');
});
