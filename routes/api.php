<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiUsers;
use App\Http\Controllers\Api\ApiLabs;
use App\Http\Controllers\Api\ApiNetworks;
use Illuminate\Support\Facades\Auth;

Route::get('/user', function (Request $request) {return $request->user();})->middleware('auth:sanctum');

