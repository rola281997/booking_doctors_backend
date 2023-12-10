<?php

use App\Http\Controllers\Api\Doctors\AdminDoctorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/ 
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('doctors', AdminDoctorController::class);
    Route::get('doctors/weeksdays/split_times', [AdminDoctorController::class,'getWeekDaysSplitTimes']);
});
