<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::get('/movie', [MovieController::class, 'index']);
Route::get('/movie/create', [MovieController::class, 'create']);
Route::post('/movie', [MovieController::class, 'store']);
Route::delete('/movie/hapus/{id}', [MovieController::class, 'destroy'])->name('movie.destroy');
Route::get('/movie/{id}/edit', [MovieController::class, 'edit'])->name('movie.edit');
Route::put('/movie/{id}', [MovieController::class, 'update'])->name('movie.update');
