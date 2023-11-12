<?php

use App\Http\Controllers\Api\Auth\AdminAuthController;
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
Route::group(['prefix'=>'admins'], function () {
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/logout', [AdminAuthController::class, 'logout']);
    });
});


