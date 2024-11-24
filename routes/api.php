<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\userController;
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



///////////////////////////////////////////////////////////////////
/// Employees routes

Route::get('/employees', [EmployeeController::class, 'index']);
Route::post('/employees', [EmployeeController::class, 'store']);
Route::get('/employees/{id}', [EmployeeController::class, 'show']);
Route::put('/employees/{id}', [EmployeeController::class, 'update']);
Route::delete('/employees/{id}', [EmployeeController::class, 'delete']);


// Route::get('/students', [StudentsController::class, 'index']);
// Route::post('/students', [StudentsController::class, 'store']);
// Route::get('/students/{id}', [StudentsController::class, 'show']);
// Route::put('/students/{id}', [StudentsController::class, 'update']);
// Route::delete('/students/{id}', [StudentsController::class, 'destroy']);

Route::apiResource('/students', StudentsController::class);

//Route::get('/students', 'App\Http\Controllers\StudentsController@index');

//////////////////////////////////////////////////////////////////////////////


Route::apiResource('users', userController::class);


Route::get('/profiles', [ProfileController::class, 'index']);
Route::post('/profiles', [ProfileController::class, 'store']);
Route::get('/profiles/{id}', [ProfileController::class, 'show']);
Route::put('/profiles/{id}', [ProfileController::class, 'update']);
Route::delete('/profiles/{id}', [ProfileController::class, 'delete']);
Route::get('/user/{id}/profile', [ProfileController::class, 'getUserProfile']);
