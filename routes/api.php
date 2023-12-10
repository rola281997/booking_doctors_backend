<?php

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
Route::group([], base_path('routes/api_routes/admin_routes.php'));
Route::group(['prefix'=>'admin'], base_path('routes/api_routes/admin_service_routes.php'));
Route::group(['prefix'=>'admin'], base_path('routes/api_routes/admin_doctor_routes.php'));


