<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\DetailDoctorController;
use App\Http\Controllers\Admin\ShiftController;
use App\Http\Controllers\Doctor\DoctorController as DoctorMain;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//client
Route::get('/', [ClientController::class, 'index'])->name('client');
Route::get('/detail-doctor/{id}', [DetailDoctorController::class, 'detailDoctor'])->name('detailDoctor');
Route::post('/detail-doctor/{id}', [DetailDoctorController::class, 'booking'])->middleware('auth')->name('booking');
Route::get('/delete/{id}', [DetailDoctorController::class, 'deleteBooking'])->middleware('auth')->name('deleteBooking');
Route::get('/restore/{id}', [ShiftController::class, 'restoreShift'])->middleware('auth')->name('restoreShift');
Route::get('/profile/{id}', [DetailDoctorController::class, 'detailPatient'])->name('detailPatient');
Route::get('/package/{id}', [ClientController::class, 'selectPackage'])->name('package');
Route::get('/package-bill', [ClientController::class, 'packageBill'])->name('package.bill');
Route::get('/save-bill-package', [ClientController::class, 'saveBill'])->name('package.save');


Route::post('/ajax/detail-doctor/{id}', [DetailDoctorController::class, 'ajaxDetailDoctor'])->name('ajax.detailDoctor');
Route::post('/ajax/profile', [DetailDoctorController::class, 'ajaxStatusBooking'])->name('ajax.statusBooking');
Route::post('/ajax/getDoctor', [DetailDoctorController::class, 'ajaxDoctorModal'])->name('ajax.doctorModal');
Route::post('/ajax/searchDoctor', [ClientController::class, 'ajaxSearch'])->name('ajax.searchDoctor');

//admin
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('doctor', DoctorController::class);
    Route::resource('patient', PatientController::class);
    Route::get('/shift', [ShiftController::class, 'index'])->name('shift');
    Route::post('/delete-soft-shift', [ShiftController::class, 'deleteSoftShift'])->name('delete-shift');
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::get('/confirm/{id}', [BookingController::class, 'confirm'])->name('confirm');
    Route::get('/cancel/{id}', [BookingController::class, 'cancel'])->name('cancel');
});


//doctor
Route::prefix('doctor')->middleware(['auth'])->name('doctor.')->group(function() {
   Route::get('/', [DoctorMain::class, 'index'])->name('main');
   Route::get('/doctor-shift', [DoctorMain::class, 'selectShift'])->name('shift.doctor');
   Route::post('create-shift-doctor/{id}', [DoctorMain::class, ''])->name('create.shift');
});

