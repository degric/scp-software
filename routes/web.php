<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\TempUserController;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\NetworkController;


// Vista Principal para los Alumnos. 
Route::get('/', [TempUserController::class, 'index'])->name('home');

// Comentarios de los alumnos. 
Route::get('/comments', [TempUserController::class, 'comments']);






// Login para los administradores y para los encargados de laboratorio. 
Route::view('/login', 'login')->name('loginView');
Route::post('/login', [LoginController::class, 'login'])->name('login');




Route::middleware('auth')->group(function () {
    // Ruta principal para el admin
    Route::get('/admin', [AdminController::class, 'admin'])->name('dashboard');

    // Ruta para la vista principal de usuarios
    Route::get('/admin/users', [UsersController::class, 'users_view'])->name('showUsers');

    // Rutas para la gestión de usuarios
    Route::prefix('admin/user')->group(function () {
        Route::get('/updateUser/{id}', [UsersController::class, 'userUpdate_view'])->name('updateUser_view');
        Route::get('/createUser', [UsersController::class, 'userCreate_view'])->name('showCreateForm');
        Route::post('/createUser', [UsersController::class, 'createUser'])->name('createUser');
        Route::put('/updateUser/{id}', [UsersController::class, 'updateUser'])->name('updateUser');
        Route::delete('/deleteUser/{id}', [UsersController::class, 'deleteUser'])->name('deleteUser');
    });


    //Laboratorios

    Route::get('/admin/labs', [LabController::class, 'showLabsView'])->name('showLabsView');

    Route::prefix('admin/labs')->group(function () {
        Route::get('/createLab', [LabController::class, 'showCreateFormLab'])->name("showCreateFormLab");
        Route::post('/createLab', [LabController::class, 'createLab'])->name('createLab');
        Route::delete('/deleteLab/{id}', [LabController::class, 'deleteLab'])->name('deleteLab');
        Route::get('/showUpdateLab/{id}', [LabController::class, 'showUpdateLab'])->name('showUpdateLab');
        Route::put('/showUpdateLab/{id}', [LabController::class, 'updateLab'])->name('updateLab');

        Route::get('/{id}' , [LabController::class, 'showLab'])->name('showLab');
    });



    Route::get('/admin/networks', [NetworkController::class, 'showNetworksView'])->name('showNetworksView');

    Route::prefix('admin/networks')->group(function () {
        Route::get('/createNetwork', [NetworkController::class, 'showCreateFormNetwork'])->name("showCreateFormNetwork");
        Route::post('/createNetwork', [NetworkController::class, 'createNetwork'])->name('createNetwork');
        Route::delete('/deleteNetwork/{id}', [NetworkController::class, 'deleteNetwork'])->name('deleteNetwork');
        Route::get('/showUpdateNetwork/{id}', [NetworkController::class, 'showUpdateNetwork'])->name('showUpdateNetwork');
        Route::put('/showUpdateNetwork/{id}', [NetworkController::class, 'updateNetwork'])->name('updateNetwork');

        Route::get('/{id}', [NetworkController::class, 'showNetwork'])->name('showNetwork');
    });
});




Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
