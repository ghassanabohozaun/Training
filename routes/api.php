<?php

use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return 'test';
});

Route::get('/index', [TestController::class, 'index']);
