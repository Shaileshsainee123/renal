<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\StaffController;
use App\Http\Middleware\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::any('/', function () {
    return redirect(route('login'));
});
Auth::routes();

Route::any('register', function () {
    return redirect(route('login'));
});

Route::get('user', function () {
    return view('layouts.dash');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group([
    'prefix' => 'admin', 'middleware' => ['auth', 'admin']
], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admins', [AdminController::class, 'admin'])->name('admin.admins');
    Route::get('/doctors', [AdminController::class, 'doctors'])->name('admin.doctors');
    Route::get('/staffs', [AdminController::class, 'staffs'])->name('admin.staffs');
    Route::post('/saveusers', [AdminController::class, 'saveusers'])->name('admin.saveusers');
    Route::get('/getusers', [AdminController::class, 'getusers'])->name('admin.getusers');
    Route::get('/deleteuser/{user}', [AdminController::class, 'deleteuser'])->name('admin.deleteuser');
    Route::get('/branches',[AdminController::class,'branches'])->name('admin.branches');
    Route::post('/savebranches',[AdminController::class,'savebranches'])->name('admin.savebranches');
    Route::get('/getBranches',[AdminController::class,'getBranches'])->name('admin.getBranches');    
    Route::get('/deletebranch/{del}',[AdminController::class,'deletebranch'])->name('admin.deletebranch');    

});

Route::group([
    'prefix' => 'staff', 'middleware' => ['auth', 'staff']
], function () {
    Route::get('/', [StaffController::class, 'index'])->name('staff.dashboard');
    Route::get('/patient',[StaffController::class,"patient"])->name('staff.patient');
    Route::post('/savepetients',[StaffController::class,'savepetients'])->name('staff.savepetients');
    Route::get('/getPetients',[StaffController::class,'getPetients'])->name('staff.getPetients');  
    Route::get('/delpetients/{del}',[StaffController::class,'deletepetient'])->name('staff.deletepetient');    
});

Route::group([
    'prefix' => 'doctor', 'middleware' => ['auth', 'doctor']
], function () {
    Route::get('/', [DoctorController::class, 'index'])->name('doctor.dashboard');
   
});



    