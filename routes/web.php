<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// ===== FORM =====
Route::get('/register', [AuthController::class, 'showRegister']);
Route::get('/login', [AuthController::class, 'showLogin']);

// ===== XỬ LÝ =====
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// ===== HOME (BẢO VỆ) =====
Route::get('/home', function () {
    return view('home');
})->middleware('auth');
