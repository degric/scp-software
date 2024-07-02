<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'index'] );


Route::get('/admin', function(){
    return "Hola, si se pudo, /admin";
});