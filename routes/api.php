<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientDetailController;
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

///////////////////////////////////////////////////////////////////////////
//Route::apiResource('/clients', ClientController::class);

Route::get('/clients', [ClientController::class, 'index']);
Route::post('/clients', [ClientController::class, 'store']);
Route::get('/clients/{id}', [ClientController::class, 'show']);
Route::delete('/clients/{id}', [ClientController::class, 'delete']);
Route::put('/clients/{id}', [ClientController::class, 'update']);

Route::apiResource('clientDetails', ClientDetailController::class);


///////////////////////////////////////////////////////////////////////////

Route::get('/tasks', [TasksController::class, 'index']);
Route::Post('tasks', [TasksController::class, 'store']);
Route::put('tasks/{id}', [TasksController::class, 'update']);
Route::get('/tasks/{id}', [TasksController::class, 'show']);
Route::delete('tasks/{id}', [TasksController::class, 'delete']);
