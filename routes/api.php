<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/task', [TasksController::class, 'index']);
Route::Post('task', [TasksController::class, 'store']);
Route::put('task/{id}', [TasksController::class, 'update']);
Route::get('/task/{id}', [TasksController::class, 'show']);
Route::delete('task/{id}', [TasksController::class, 'delete']);


Route::get('/article', [ArticleController::class, 'index']);
Route::get('/article/{id}', [ArticleController::class, 'show']);

Route::post('/article', [ArticleController::class, 'store']);
Route::post('/store2', [ArticleController::class, 'store2']);

Route::put('/article/{id}', [ArticleController::class, 'update']);
Route::delete('/article/{id}', [ArticleController::class, 'delete']);
