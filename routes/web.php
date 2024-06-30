<?php

use App\Http\Controllers\WebAdminAttendanceController;
use App\Http\Controllers\WebLoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(WebLoginController::class)->group(function () {
    Route::get('/admin/dashboard', 'dashboard')->middleware('isLoggedIn');
    Route::get('/admin/login', 'showLoginForm')->middleware('alreadyLoggedIn');
    Route::post('/login-admin', 'login')->name('login-admin');
    Route::get('/admin/logout', 'logout');
});

Route::middleware('isLoggedIn')->controller(WebAdminAttendanceController::class)->group(function () {
    Route::get('/admin/attendance', 'getAllAttendances');
    Route::get('/admin/attendance/search', 'getSpecificAttendanceDate');
});
