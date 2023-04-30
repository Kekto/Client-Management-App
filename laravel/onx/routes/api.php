<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ex_1', [ClientController::class, 'ex_1']);

Route::get('/isFree/{id}', [CarController::class, 'ex_2']);

// CLIENTS
Route::get('/clients', [ClientController::class, 'readAll']);
Route::get('/clients/{id}', [ClientController::class, 'read']);
Route::post('/clients', [ClientController::class, 'create']);
Route::put('/clients/{id}', [ClientController::class, 'update']);
Route::delete('/clients/{id}', [ClientController::class, 'delete']);

//ORDERS
Route::get('/orders', [ClientController::class, 'readAll']);
Route::get('/orders/{id}', [ClientController::class, 'read']);
Route::post('/orders', [ClientController::class, 'create']);
Route::put('/orders/{id}', [ClientController::class, 'update']);
Route::delete('/orders/{id}', [ClientController::class, 'delete']);

//EMPLOYEES
Route::get('/employees', [ClientController::class, 'readAll']);
Route::get('/employees/{id}', [ClientController::class, 'read']);
Route::post('/employees', [ClientController::class, 'create']);
Route::put('/employees/{id}', [ClientController::class, 'update']);
Route::delete('/employees/{id}', [ClientController::class, 'delete']);

//CARS
Route::get('/cars', [ClientController::class, 'readAll']);
Route::get('/cars/{id}', [ClientController::class, 'read']);
Route::post('/cars', [ClientController::class, 'create']);
Route::put('/cars/{id}', [ClientController::class, 'update']);
Route::delete('/cars/{id}', [ClientController::class, 'delete']);
