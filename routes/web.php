<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimekeeperController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WelcomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');





Route::resource('timekeepers', TimekeeperController::class);
Route::resource('projects', ProjectController::class);
Route::resource('tasks', TaskController::class);
