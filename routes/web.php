<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgeController;

Route::get('/age', [AgeController::class, 'showForm']);
Route::post('/age', [AgeController::class, 'store']);

Route::get('/dashboard', function () {
    return 'Chào mừng bạn vào Dashboard 🎉';
})->middleware('check.age');
