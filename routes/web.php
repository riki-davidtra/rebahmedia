<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/posts', [HomeController::class, 'post'])->name('posts.index');
Route::get('/posts/{slug}', [HomeController::class, 'postShow'])->name('posts.show');

// Route::get('/', function () {
//     return redirect()->route('filament.admin.pages.dashboard');
// });

Route::get('/auth/redirect/{provider}', [AuthController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/callback/{provider}', [AuthController::class, 'callback'])->name('auth.callback');
Route::get('/auth/create-password', [AuthController::class, 'create_password'])->name('auth.create-password');
Route::post('/auth/create-password/update', [AuthController::class, 'create_password_update'])->name('auth.create-password.update');
Route::get('/auth/create-password/skip', [AuthController::class, 'create_password_skip'])->name('auth.create-password.skip');
