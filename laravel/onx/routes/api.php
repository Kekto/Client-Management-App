<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
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
Route::get('/orders', [OrderController::class, 'readAll']);
Route::get('/orders/{id}', [OrderController::class, 'read']);
Route::post('/orders', [OrderController::class, 'create']);
Route::put('/orders/{id}', [OrderController::class, 'update']);
Route::delete('/orders/{id}', [OrderController::class, 'delete']);

//EMPLOYEES
Route::get('/employees', [EmployeeController::class, 'readAll']);
Route::get('/employees/{id}', [EmployeeController::class, 'read']);
Route::post('/employees', [EmployeeController::class, 'create']);
Route::put('/employees/{id}', [EmployeeController::class, 'update']);
Route::delete('/employees/{id}', [EmployeeController::class, 'delete']);

//CARS
Route::get('/cars', [CarController::class, 'readAll']);
Route::get('/cars/{id}', [CarController::class, 'read']);
Route::post('/cars', [CarController::class, 'create']);
Route::put('/cars/{id}', [CarController::class, 'update']);
Route::delete('/cars/{id}', [CarController::class, 'delete']);
