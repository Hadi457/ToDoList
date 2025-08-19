<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
Route::middleware(['user'])->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('todos.index');
    Route::post('/todos/create', [TodoController::class, 'store'])->name('todos.store');
    Route::post('/todos/{id}/status', [TodoController::class, 'updateStatus'])->name('todos.updateStatus');
    Route::get('/todos/{id}/delete', [TodoController::class, 'delete'])->name('todos.delete');

});
Route::get('/login', [Authentication::class, 'index'])->name('login');
Route::post('/login', [Authentication::class, 'auth'])->name('auth');
Route::get('/logout', [Authentication::class, 'logout'])->name('logout');
Route::get('/register', [Authentication::class, 'register'])->name('register');
Route::post('/register', [Authentication::class, 'store'])->name('store');
