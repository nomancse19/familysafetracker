<?php

use App\Http\Controllers\Api\V1\ChildAuthController;
use App\Http\Controllers\Api\V1\ChildUserLocationController;
use App\Models\Api\ChildUserLocationDataModel;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('User/Login',[ChildAuthController::class,'login']);
Route::post('User/SendOTP',[ChildAuthController::class,'send_user_otp']);

Route::post('User/SendUserLocation',[ChildUserLocationController::class,'send_user_location_data'])->middleware('auth:sanctum');
Route::post('User/SendEmergencyUserLocation',[ChildUserLocationController::class,'send_emergency_user_location_data'])->middleware('auth:sanctum');

