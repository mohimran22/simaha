<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LicensesController;
use App\Http\Controllers\LicenseHoldersController;
use App\Http\Controllers\LicenseHolderEducationController;
use App\Http\Controllers\LicenseHolderWorkExperience;
use App\Http\Controllers\LicenseHolderFamilyMember;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeEducationController;
use App\Http\Controllers\EmployeeWorkExperienceController;
use App\Http\Controllers\EmployeeFamilyMemberController;
use App\Http\Controllers\StudentsController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'permission:lisensi.tambah'])->group(function () {
    Route::resource('/licenses', LicensesController::class)->only(['create', 'store']);
});

Route::middleware(['auth', 'permission:lisensi.ubah'])->group(function () {
    Route::resource('/licenses', LicensesController::class)->only(['edit', 'update']);
});

Route::middleware(['auth', 'role:Super-Admin|Pemilik Lisensi'])->group(function () {
    Route::resource('/licenses', LicensesController::class)->only(['index', 'show', 'destroy']);
});

Route::middleware(['auth', 'permission:pemilik-lisensi.tambah'])->group(function () {
    Route::resource('/license_holders', LicenseHoldersController::class)->only(['create', 'store']);
});

Route::middleware(['auth', 'permission:pemilik-lisensi.ubah'])->group(function () {
    Route::resource('/license_holders', LicenseHoldersController::class)->only(['edit', 'update']);
});

Route::middleware(['auth', 'role:Super-Admin|Pemilik Lisensi'])->group(function () {
    Route::resource('/license_holders', LicenseHoldersController::class)->only(['index', 'show', 'destroy']);
});

Route::resource('employees', EmployeeController::class);

Route::resource('students', StudentsController::class);

Route::get('/accounting', [AccountingController::class, 'index'])->name('accounting.index');


Route::middleware(['auth', 'role:Super-Admin'])->group(function () {
    Route::resource('roles', RoleController::class);
});

require __DIR__.'/auth.php';
Auth::routes();


Route::middleware(['auth', 'role:Super-Admin|Pemilik Lisensi'])->group(function () {
    route::resource('/users', UsersController::class);
});

Route::get('/license_holders/{id}/licenses', [LicenseHoldersController::class, 'showLicense'])->name('license_holders.licenses');
Route::get('/license_holders/{id}/profile', [LicenseHoldersController::class, 'showProfile'])->name('license_holders.profile');
Route::get('/license_holders/{id}/educations', [LicenseHoldersController::class, 'showTab'])->name('license_holders.educations');
Route::get('/license_holders/{id}/workers', [LicenseHoldersController::class, 'showWorks'])->name('license_holders.workers');
Route::get('/license_holders/{id}/families', [LicenseHoldersController::class, 'showFams'])->name('license_holders.families');



route::resource('/license_holder_educations', LicenseHolderEducationController::class);
route::resource('/license_holder_workers', LicenseHolderWorkExperience::class);
route::resource('/license_holder_families', LicenseHolderFamilyMember::class);

Route::get('/employees/{id}/profile', [EmployeeController::class, 'showProfile'])->name('employees.profile');
Route::get('/employees/{id}/educations', [EmployeeController::class, 'showTab'])->name('employees.educations');
Route::get('/employees/{id}/workers', [EmployeeController::class, 'showWorks'])->name('employees.workers');
Route::get('/employees/{id}/families', [EmployeeController::class, 'showFams'])->name('employees.families');

route::resource('/employee_educations', EmployeeEducationController::class);
route::resource('/employee_workers', EmployeeWorkExperienceController::class);
route::resource('/employee_families', EmployeeFamilyMemberController::class);


Route::get('/api/cities/{province_id}', function ($province_id) {
    return \App\Models\City::where('province_id', $province_id)->select('id', 'name')->get();
});

Route::get('/api/districts/{city_id}', function ($city_id) {
    return \App\Models\District::where('city_id', $city_id)->select('id', 'name')->get();
});

Route::get('/api/sub_districts/{district_id}', function ($district_id) {
    return \App\Models\SubDistrict::where('district_id', $district_id)->select('id', 'name')->get();
});

Route::get('/api/postal_codes/{sub_district_id}', function ($sub_district_id) {
    return \App\Models\PostalCode::where('sub_district_id', $sub_district_id)->select('id', 'postal_code')->get();
});
