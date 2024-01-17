<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DriverController;



Route::get('/', [HomeController::class, 'index']);

Route::get('/authors', [AuthorController::class, 'list']);
Route::get('/authors/create', [AuthorController::class, 'create']);
Route::post('/authors/put', [AuthorController::class, 'put']);
Route::get('/authors/update/{author}', [AuthorController::class, 'update']);
Route::post('/authors/patch/{author}', [AuthorController::class, 'patch']);
Route::post('/authors/delete/{author}', [AuthorController::class, 'delete']);

Route::get('/cars', [CarController::class, 'list']);
Route::get('/cars/create', [CarController::class, 'create']);
Route::post('/cars/put', [CarController::class, 'put']);
Route::get('/cars/update/{car}', [CarController::class, 'update']);
Route::post('/cars/patch/{car}', [CarController::class, 'patch']);
Route::post('/cars/delete/{car}', [CarController::class, 'delete']);

Route::get('/login', [AuthController::class, 'login'])-> name('login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/auth', [AuthController::class, 'authenticate']);

Route::get('/drivers', [DriverController::class, 'list']);
Route::get('/drivers/create', [DriverController::class, 'create']);
Route::post('/drivers/put', [DriverController::class, 'put']);
Route::get('/drivers/update/{driver}', [DriverController::class, 'update']);
Route::post('/drivers/patch/{driver}', [DriverController::class, 'patch']);
Route::post('/drivers/delete/{driver}', [DriverController::class, 'delete']);

