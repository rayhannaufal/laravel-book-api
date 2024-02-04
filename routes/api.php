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

Route::post('/login',[AuthenticationController::class, 'login']);
Route::get('/books',[BookController::class, 'index']); // Daftar buku
Route::get('/books/{id}',[BookController::class, 'show']); // Detail buku

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/books/add',[BookController::class, 'store']); // Tambah daftar buku
    Route::post('/books/{id}',[BookController::class, 'update']); // Edit daftar buku
    Route::delete('books/{id}',[BookController::class, 'delete']); // Hapus daftar buku

    Route::get('/rent',[UserBookController::class, 'index']); // Daftar peminjaman buku

    Route::post('/store',[UserBookController::class, 'store']); // Tambah daftar peminjaman buku
    Route::patch('/store/{id}',[UserBookController::class, 'update']); // Edit daftar peminjaman buku
    Route::delete('/store/{id}',[UserBookController::class, 'delete']); // Hapus daftar peminjaman buku

    Route::get('/me',[AuthenticationController::class, 'me']);
    Route::get('/logout',[AuthenticationController::class, 'logout']);
});
