<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\AppointmentController;

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

Route::get("contacts", [ContactController::class,'list']);


Route::get('/covid', 'App\Http\Controllers\CovidController@getCovid');
Route::get('/influenza', 'App\Http\Controllers\InfluenzaController@getInfluenza');
Route::get('/doctorinfo', 'App\Http\Controllers\DoctorInfoController@getDoctorInfo');

//Appointment

//Login
Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum'])->group(function (){
    
    Route::post('appointment/add', [AppointmentController::class, 'store']);
    Route::get('appointments', [AppointmentController::class, 'index']);
    Route::put('appointment/{id}/update', [AppointmentController::class, 'update']);
    Route::delete('appointment/{id}/delete', [AppointmentController::class, 'destroy']);

    Route::post('logout', [AuthController::class, 'logout']);
  
    //Get doctorappoinments

    Route::get('doctorappointments', [AppointmentController::class, 'doctorap']);

});