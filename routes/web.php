<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnclabController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\TempUserController;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\NetworkController;

// Ruta para el inicio y otras páginas públicas
Route::get('/', [TempUserController::class, 'index'])->name('home');
Route::get('/comments', [TempUserController::class, 'comments']);

// Login y logout
Route::view('/login', 'login')->name('loginView');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas para admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'admin'])->name('dashboard');

    Route::get('/users', [UsersController::class, 'users_view'])->name('showUsers');

    Route::prefix('user')->group(function () {
        Route::get('/updateUser/{id}', [UsersController::class, 'userUpdate_view'])->name('updateUser_view');
        Route::get('/createUser', [UsersController::class, 'userCreate_view'])->name('showCreateForm');
        Route::post('/createUser', [UsersController::class, 'createUser'])->name('createUser');
        Route::put('/updateUser/{id}', [UsersController::class, 'updateUser'])->name('updateUser');
        Route::delete('/deleteUser/{id}', [UsersController::class, 'deleteUser'])->name('deleteUser');
    });

    Route::get('/labs', [LabController::class, 'showLabsView'])->name('showLabsView');

    Route::prefix('labs')->group(function () {
        Route::get('/createLab', [LabController::class, 'showCreateFormLab'])->name("showCreateFormLab");
        Route::post('/createLab', [LabController::class, 'createLab'])->name('createLab');
        Route::delete('/deleteLab/{id}', [LabController::class, 'deleteLab'])->name('deleteLab');
        Route::get('/showUpdateLab/{id}', [LabController::class, 'showUpdateLab'])->name('showUpdateLab');
        Route::put('/showUpdateLab/{id}', [LabController::class, 'updateLab'])->name('updateLab');
        Route::get('/{id}', [LabController::class, 'showLab'])->name('showLab');
    });

    Route::get('/networks', [NetworkController::class, 'showNetworksView'])->name('showNetworksView');

    Route::prefix('networks')->group(function () {
        Route::get('/createNetwork', [NetworkController::class, 'showCreateFormNetwork'])->name("showCreateFormNetwork");
        Route::post('/createNetwork', [NetworkController::class, 'createNetwork'])->name('createNetwork');
        Route::delete('/deleteNetwork/{id}', [NetworkController::class, 'deleteNetwork'])->name('deleteNetwork');
        Route::get('/showUpdateNetwork/{id}', [NetworkController::class, 'showUpdateNetwork'])->name('showUpdateNetwork');
        Route::put('/showUpdateNetwork/{id}', [NetworkController::class, 'updateNetwork'])->name('updateNetwork');
        Route::get('/{id}', [NetworkController::class, 'showNetwork'])->name('showNetwork');
    });
});

// Rutas para enclab
Route::middleware(['auth', 'enclab'])->prefix('enclab')->group(function () {
    Route::get('/', [EnclabController::class, 'home'])->name('homeEnclab');
    Route::get('/labs', [EnclabController::class, 'showlabs'])->name('showlabsEnclabs');
    Route::get('/lab/{id}', [EnclabController::class, 'showlab'])->name('showLabEncLab');
});