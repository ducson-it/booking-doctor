<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\DetailDoctorController;
use App\Http\Controllers\Admin\ShiftController;
use App\Http\Controllers\Newcontroller;
use App\Http\Controllers\Doctor\DoctorController as DoctorMain;
use App\Http\Controllers\PackageCareController;
use App\Models\Booking;
use App\Models\Package_Care;
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

//Ckeditor
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');

//client
Route::get('/', [ClientController::class, 'index'])->name('client');
Route::get('/detail-doctor/{id}', [DetailDoctorController::class, 'detailDoctor'])->name('detailDoctor');
Route::post('/detail-doctor/{id}', [DetailDoctorController::class, 'booking'])->middleware('auth')->name('booking');
Route::get('/delete/{id}', [DetailDoctorController::class, 'deleteBooking'])->middleware('auth')->name('deleteBooking');
Route::get('/restore/{id}', [ShiftController::class, 'restoreShift'])->middleware('auth')->name('restoreShift');
Route::get('/profile/{id}', [DetailDoctorController::class, 'detailPatient'])->name('detailPatient');
Route::get('profile/edit/{id}', [DetailDoctorController::class, 'editProfile'])->name('edit-profile');
Route::post('profile/edit/{id}', [DetailDoctorController::class, 'updateProfilePatient'])->name('update-profile');
Route::get('/package/{id}', [ClientController::class, 'selectPackage'])->name('package');
Route::get('/package-bill', [ClientController::class, 'packageBill'])->name('package.bill');
Route::post('/save-bill-package', [ClientController::class, 'saveBill'])->name('package.save');
Route::get('/infor-success', [ClientController::class, 'inforSuccess'])->name('package.inforSuccess');

//List package
Route::get('/check-package', [ClientController::class, 'checkPackage'])->name('package.check');
//search schedule
Route::get('/search-schedule', [ClientController::class, 'scheduleClient'])->name('search.schedule');
//new main
Route::get('/new-main/{id}', [ClientController::class, 'newMain'])->name('newMain');

Route::post('/ajax/detail-doctor/{id}', [DetailDoctorController::class, 'ajaxDetailDoctor'])->name('ajax.detailDoctor');
Route::post('/ajax/profile', [DetailDoctorController::class, 'ajaxStatusBooking'])->name('ajax.statusBooking');
Route::post('/ajax/getDoctor', [DetailDoctorController::class, 'ajaxDoctorModal'])->name('ajax.doctorModal');
Route::post('/ajax/searchDoctor', [ClientController::class, 'ajaxSearch'])->name('ajax.searchDoctor');
Route::post('/ajax/search-schedule', [DoctorMain::class, 'ajaxGetSchedule'])->name('ajax.getSchedule');

//admin
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('doctor', DoctorController::class);
    Route::resource('patient', PatientController::class);
    Route::resource('package', PackageCareController::class);
    Route::get('/shift', [ShiftController::class, 'index'])->name('shift');
    Route::post('/delete-soft-shift', [ShiftController::class, 'deleteSoftShift'])->name('delete-shift');
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::get('/confirm/{id}', [BookingController::class, 'confirm'])->name('confirm');
    Route::get('/cancel/{id}', [BookingController::class, 'cancel'])->name('cancel');
    Route::get('/news', [NewController::class, 'index'])->name('new');
    Route::post('/news', [NewController::class, 'store'])->name('new.store');
    Route::get('/list-news', [NewController::class, 'listNew'])->name('new.list');
    Route::get('/delete-news/{id}', [NewController::class, 'deleteNew'])->name('new.delete');
    Route::get('/edit-news/{id}', [NewController::class, 'editNew'])->name('new.edit');
    Route::post('/update-news/{id}', [NewController::class, 'updateNew'])->name('new.update');
});


//doctor
Route::prefix('doctor')->middleware(['auth'])->name('doctor.')->group(function() {
   Route::get('/', [DoctorMain::class, 'index'])->name('main');
   Route::get('/profile-doctor', [DoctorMain::class, 'profileDoctor'])->name('profile.doctor');
   Route::get('/edit-doctor', [DoctorMain::class, 'editProfileDoctor'])->name('profile.edit');
   Route::post('/update-doctor', [DoctorMain::class, 'updateProfileDoctor'])->name('profile.update');
   Route::get('/doctor-shift', [DoctorMain::class, 'selectShift'])->name('shift.doctor');
   Route::post('/create-shift-doctor', [DoctorMain::class, 'createShift'])->name('create.shift');
   Route::get('/manager-patient', [DoctorMain::class, 'managerPatient'])->name('manager.patient');
   Route::get('/diagnose-patient/{id}', [DoctorMain::class, 'diagnosePatient'])->name('diagnose.patient');
   Route::post('/create-patient/{id}', [DoctorMain::class, 'createDiagnose'])->name('create.diagnose');
   Route::get('/download-patient/{id}', [DoctorMain::class, 'downloadDiagnose'])->name('download.diagnose');
   Route::get('/update-patient/{id}', [DoctorMain::class, 'editDiagnose'])->name('edit.diagnose');
   Route::post('/update-patient/{id}', [DoctorMain::class, 'updateDiagnose'])->name('update.diagnose');
   Route::get('/delete-patient/{id}', [DoctorMain::class, 'deleteDiagnose'])->name('delete.diagnose');
});

