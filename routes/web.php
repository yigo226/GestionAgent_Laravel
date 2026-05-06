<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AgentController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('services', ServiceController::class);
Route::resource('agents', AgentController::class);