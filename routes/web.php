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

    // Lection/Subjects Route
    Route::get('/subject/index', [LectionControllers::class, "subjectIndex"])->name('subject.index');
    Route::get('/subject/create', [LectionControllers::class, "subjectCreate"])->name('subject.create');
    Route::post('/subject/store', [LectionControllers::class, "subjectStore"])->name('subject.store');
    Route::get('/subject/edit/{id}', [LectionControllers::class, "subjectEdit"])->name('subject.edit');
    Route::put('/subject/update/{id}', [LectionControllers::class, "subjectUpdate"])->name('subject.update');
    Route::delete('/subject/delete/{id}', [LectionControllers::class, "subjectDelete"])->name('subject.delete');

    // Lection
    //Syarat Kerja Praktek Route
    Route::get('/internship/requisite/index', [LectionControllers::class, "internship_requisite_index"])->name('internship.requisite.index');
    Route::get('/internship/requisite/create', [LectionControllers::class, "internship_requisite_create"])->name('internship.requisite.create');
    Route::post('/internship/requisite/store', [LectionControllers::class, "internship_requisite_store"])->name('internship.requisite.store');
    Route::get('/internship/requisite/edit/{code}', [LectionControllers::class, "internship_requisite_edit"])->name('internship.requisite.edit');
    Route::put('/internship/requisite/update/{code}', [LectionControllers::class, "internship_requisite_update"])->name('internship.requisite.update');
    Route::delete('/internship/requisite/delete/{code}', [LectionControllers::class, "internship_requisite_delete"])->name('internship.requisite.delete');

    // Panduan Kerja Praktek Route
    Route::get('/internship/guide/index', [LectionControllers::class, "internship_guide_index"])->name('internship.guide.index');
    Route::get('/internship/guide/create', [LectionControllers::class, "internship_guide_create"])->name('internship.guide.create');
    Route::post('/internship/guide/store', [LectionControllers::class, "internship_guide_store"])->name('internship.guide.store');
    Route::get('/internship/guide/edit/{code}', [LectionControllers::class, "internship_guide_edit"])->name('internship.guide.edit');
    Route::put('/internship/guide/update/{code}', [LectionControllers::class, "internship_guide_update"])->name('internship.guide.update');
    Route::delete('/internship/guide/delete/{code}', [LectionControllers::class, "internship_guide_delete"])->name('internship.guide.delete');

    // Skripsi Syarat Route
    Route::get('/skripsi/requisite/index', [LectionControllers::class, "skripsi_requisite_index"])->name('skripsi.requisite.index');
    Route::get('/skripsi/requisite/create', [LectionControllers::class, "skripsi_requisite_create"])->name('skripsi.requisite.create');
    Route::post('/skripsi/requisite/store', [LectionControllers::class, "skripsi_requisite_store"])->name('skripsi.requisite.store');
    Route::get('/skripsi/requisite/edit/{code}', [LectionControllers::class, "skripsi_requisite_edit"])->name('skripsi.requisite.edit');
    Route::put('/skripsi/requisite/update/{code}', [LectionControllers::class, "skripsi_requisite_update"])->name('skripsi.requisite.update');
    Route::delete('/skripsi/requisite/delete/{code}', [LectionControllers::class, "skripsi_requisite_delete"])->name('skripsi.requisite.delete');

    // Skripsi Panduan Route
    Route::get('/skripsi/guide/index', [LectionControllers::class, "skripsi_guide_index"])->name('skripsi.guide.index');
    Route::get('/skripsi/guide/create', [LectionControllers::class, "skripsi_guide_create"])->name('skripsi.guide.create');
    Route::post('/skripsi/guide/store', [LectionControllers::class, "skripsi_guide_store"])->name('skripsi.guide.store');
    Route::get('/skripsi/guide/edit/{code}', [LectionControllers::class, "skripsi_guide_edit"])->name('skripsi.guide.edit');
    Route::put('/skripsi/guide/update/{code}', [LectionControllers::class, "skripsi_guide_update"])->name('skripsi.guide.update');
    Route::delete('/skripsi/guide/delete/{code}', [LectionControllers::class, "skripsi_guide_delete"])->name('skripsi.guide.delete');

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
