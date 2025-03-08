<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;

Route::get('/', [DashboardController::class, 'show']);
Route::get('/daftar', [DaftarController::class, 'show']);
Route::post('/daftar', [DaftarController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/genre/create', [GenreController::class, 'create']);
    Route::post('/genre', [GenreController::class, 'store']);
    Route::get('genre/{id}/edit', [GenreController::class, 'edit']);
    Route::put('genre/{id}', [GenreController::class, 'update']);
    Route::delete('genre/{id}', [GenreController::class, 'destroy']);
});


Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);
Route::resource('books', BookController::class);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/comment', [CommentController::class, 'store']);
Route::delete('/comment/{id}', [CommentController::class, 'destroy']);