<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PosteController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('services', ServiceController::class);
Route::resource('agents', AgentController::class);
Route::resource('postes', PosteController::class);
