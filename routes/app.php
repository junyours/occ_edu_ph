<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SdgController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/admin/sdg', [SdgController::class, 'index']);
  Route::post('/admin/sdg/add', [SdgController::class, 'add']);
  Route::post('/admin/sdg/update', [SdgController::class, 'update']);
  Route::post('/admin/sdg/delete', [SdgController::class, 'delete']);

  Route::get('/admin/news', [NewsController::class, 'index']);
  Route::post('/admin/news/add', [NewsController::class, 'add']);
  Route::post('/admin/news/update', [NewsController::class, 'update']);
  Route::post('/admin/news/delete', [NewsController::class, 'delete']);
});