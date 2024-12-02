<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('tasks', [TasksController::class, 'index']);
Route::post('/tasks', [TasksController::class, 'store']);
Route::get('/tasks/{id?}', [TasksController::class, 'show']);
Route::delete('/tasks/{id?}', [TasksController::class, 'destroy']);
Route::put('/tasks/{id?}', [TasksController::class, 'update']);


Route::apiResource('/profiles', ProfileController::class);
