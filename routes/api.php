<?php

use App\Http\Controllers\Api\PatientController;
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

Route::controller(PatientController::class)->group(function () {
    Route::get('/patients', 'index');
    Route::post('/patient', 'store');
    Route::get('/patient/{id}', 'show');
    Route::put('/patient/{id}', 'update');
    Route::delete('/patient/{id}', 'destroy');
});
