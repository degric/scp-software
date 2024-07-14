<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TempUserController;



Route::get('/', [TempUserController::class, 'index']);
Route::get('/comments', [TempUserController::class, 'comments']);


Route::get('/login', [LoginController::class, 'index'] );


Route::get('/admin', [AdminController::class, 'admin']);