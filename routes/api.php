<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/createUser', [ApiController::class, 'createUser'])->middleware('auth:sanctum');
Route::delete('/deleteUser/{id}', [ApiController::class, 'deleteUser'])->middleware('auth:sanctum');

Route::get('/users',[ApiController::class, 'users']);
Route::post('/login',[ApiController::class, 'login']);
