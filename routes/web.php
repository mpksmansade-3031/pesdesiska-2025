<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::redirect('/', '/login');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::get('/pemilihan', [AuthController::class, 'pemilihan']);
Route::post('/pilih/{id}', [AuthController::class, 'pilih'])->name('pilih');
Route::get('/terimakasih', function () {
    return view('terimakasih');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');