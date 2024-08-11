<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\TempUserController;

// Vista Principal para los Alumnos. 
Route::get('/', [TempUserController::class, 'index'])->name('home');

// Comentarios de los alumnos. 
Route::get('/comments', [TempUserController::class, 'comments']);






// Login para los administradores y para los encargados de laboratorio. 
Route::view('/login', 'login')->name('loginView');
Route::post('/login', [LoginController::class, 'login'])->name('login');



// Vistas del administrador

Route::get('/admin', [AdminController::class, 'admin'])->middleware('auth')->name('dashboard');
Route::get('/admin/users/admins', [AdminController::class, 'users_admins'])->middleware('auth');



Route::post("/admin/createUser", [AdminController::class, 'createUser'])->middleware("auth")->name("createUser");
Route::delete("/admin/deleteUser/{id}", [AdminController::class, 'deleteUser'])->middleware("auth")->name("deleteUser");
Route::get("/admin/updateUser/{id}", [AdminController::class, 'updateUserView'])->middleware("auth")->name('updateUserView');
Route::put("/admin/updateUser/{id}", [AdminController::class, 'updateUser'])->middleware("auth")->name('updateUser');
// Logout
 

// Laboratorios

Route::get("/admin/lab/create", [LabController::class, "create_view"])->middleware("auth");
Route::post("/admin/createLab", [LabController::class, "createLab"])->middleware("auth")->name("createLab");
Route::get('/admin/lab/management', [LabController::class, "management"])->middleware("auth");
Route::delete('/admin/deleteLab/{id}', [LabController::class, "deleteLab"])->middleware("auth")->name("deleteLab");
Route::get("/admin/lab/update/{id}", [LabController::class, "update_view"])->middleware("auth");
Route::put("/admin/updateLab/{id}" , [LabController::class, "updateLab"])->middleware("auth")->name("updateLab");



Route::get('/logout', [LoginController::class, 'logout'])->name('logout');