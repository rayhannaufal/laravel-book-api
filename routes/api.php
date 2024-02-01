<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/rent',[UserBookController::class, 'index']);
    Route::post('/store',[UserBookController::class, 'store']);
    Route::patch('/store/{id}',[UserBookController::class, 'update']);
    Route::get('/me',[AuthenticationController::class, 'me']);
    Route::get('/logout',[AuthenticationController::class, 'logout']);
});

Route::get('/books',[BookController::class, 'index']);
Route::post('/login',[AuthenticationController::class, 'login']);
