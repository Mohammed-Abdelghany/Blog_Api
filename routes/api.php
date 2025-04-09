<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;


Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::delete('posts/delete/{id}', [PostController::class, 'destroy'])->middleware('auth:sanctum');
Route::post('posts/create', [PostController::class, 'store'])->middleware('auth:sanctum');
Route::put('posts/update/{id}', [PostController::class, 'update'])->middleware('auth:sanctum');
Route::resource('posts', PostController::class);
