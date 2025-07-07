<?php

use App\Http\Controllers\ListUserController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// App::setLocale('pt_BR');

Route::get('/', [ListUserController::class, 'index']);

Route::middleware('guest')->group(function () {
  Route::get('/register', [RegisteredUserController::class, 'create']);
  Route::post('/register', [RegisteredUserController::class, 'store']);

  Route::get('/login', [SessionController::class, 'create'])->name('login');
  Route::post('/login', [SessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
  Route::get('/profile', [RegisteredUserController::class, 'index']);
  Route::get('/profile/edit', [RegisteredUserController::class, 'edit']);
  Route::patch('/profile/edit', [RegisteredUserController::class, 'update']);

  Route::delete('/logout', [SessionController::class, 'destroy']);
});
