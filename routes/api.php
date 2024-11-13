<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/news', [NewsController::class, 'index']);
    Route::post('/news', [NewsController::class, 'store']);
    Route::get('/news/{news}', [NewsController::class, 'show']);
    Route::patch('/news/{news}', [NewsController::class, 'update']);
    Route::delete('/news/{news}', [NewsController::class, 'destroy']);
});

// Route Register dan login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);