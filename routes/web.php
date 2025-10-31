<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::get('/', [WebController::class, 'home'])->name('home');

require __DIR__ . '/auth.php';
