<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('v1')->group(function () {
    Route::prefix('auth')->controller(AuthController::class)->group(function () {
        Route::post('login', 'apiLogin');
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('attendance')->controller(AttendanceController::class)->group(function () {
            Route::post('clock-in', 'clockIn');
            Route::post('clock-out', 'clockOut');
            Route::get('list', 'list');
            Route::get('date', 'getSpecificAttendanceDate');
        });
    });
});
