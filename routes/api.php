<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/createUser', [ApiController::class, 'createUser'])->middleware('auth:sanctum');
Route::delete('/deleteUser/{id}', [ApiController::class, 'deleteUser'])->middleware('auth:sanctum');
Route::get('/getUsers', [ApiController::class, 'getUsers'])->middleware('auth:sanctum');
Route::get('/getUser/{id}', [ApiController::class, 'getUser'])->middleware('auth:sanctum');
Route::put('/updateUser/{id}', [ApiController::class, 'updateUser'])->middleware('auth:sanctum');


Route::post('/createLab', [ApiController::class, 'createLab'])->middleware('auth:sanctum');
Route::get('/getLabs', [ApiController::class, 'getLabs'])->middleware('auth:sanctum');
Route::get('/getLab/{id}', [ApiController::class, 'getLab'])->middleware('auth:sanctum');
Route::put('/updateLab/{id}', [ApiController::class, 'updateLab'])->middleware('auth:sanctum');
Route::delete('/deleteLab/{id}', [ApiController::class, 'deleteLab'])->middleware('auth:sanctum');

Route::post('/login',[ApiController::class, 'login']);
