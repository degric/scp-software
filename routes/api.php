<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Api\ApiUsers;
use App\Http\Controllers\Api\ApiLabs;
use App\Http\Controllers\Api\ApiNetworks;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/createUser', [ApiUsers::class, 'createUser'])->middleware('auth:sanctum');
Route::delete('/deleteUser/{id}', [ApiUsers::class, 'deleteUser'])->middleware('auth:sanctum');
Route::get('/getUsers', [ApiUsers::class, 'getUsers'])->middleware('auth:sanctum');
Route::get('/getUser/{id}', [ApiUsers::class, 'getUser'])->middleware('auth:sanctum');
Route::put('/updateUser/{id}', [ApiUsers::class, 'updateUser'])->middleware('auth:sanctum');


Route::post('/createLab', [ApiLabs::class, 'createLab'])->middleware('auth:sanctum');
Route::get('/getLabs', [ApiLabs::class, 'getLabs'])->middleware('auth:sanctum');
Route::get('/getLab/{id}', [ApiLabs::class, 'getLab'])->middleware('auth:sanctum');
Route::put('/updateLab/{id}', [ApiLabs::class, 'updateLab'])->middleware('auth:sanctum');
Route::delete('/deleteLab/{id}', [ApiLabs::class, 'deleteLab'])->middleware('auth:sanctum');

Route::post('/createNetwork', [ApiNetworks::class, 'createNetwork'])->middleware('auth:sanctum');
Route::get('/getNetworks', [ApiNetworks::class, 'getNetworks'])->middleware('auth:sanctum');
Route::get('/getNetwork/{id}', [ApiNetworks::class, 'getNetwork'])->middleware('auth:sanctum');
Route::put('/updateNetwork/{id}', [ApiNetworks::class, 'updateNetwork'])->middleware('auth:sanctum');
Route::delete('/deleteNetwork/{id}', [ApiNetworks::class, 'deleteNetwork'])->middleware('auth:sanctum');


Route::post('/login',[ApiUsers::class, 'login']);


Route::get('/test', [ApiUsers::class, 'test']);