<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SdgController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

  Route::get('/admin/sdg', [SdgController::class, 'index'])->name('admin.sdg');
  Route::get('/admin/sdg/create', [SdgController::class, 'create'])->name('admin.create.sdg');
  Route::post('/admin/sdg/add', [SdgController::class, 'add'])->name('admin.add.sdg');
  Route::get('/admin/sdg/edit/{id}', [SdgController::class, 'edit'])->name('admin.edit.sdg');
  Route::post('/admin/sdg/update/{id}', [SdgController::class, 'update'])->name('admin.update.sdg');
  Route::post('/admin/sdg/delete/{id}', [SdgController::class, 'delete'])->name('admin.delete.sdg');

  Route::get('/admin/news', [NewsController::class, 'index'])->name('admin.news');
  Route::get('/admin/news/create', [NewsController::class, 'create'])->name('admin.create.news');
  Route::post('/admin/news/add', [NewsController::class, 'add'])->name('admin.add.news');
  Route::get('/admin/news/edit/{id}', [NewsController::class, 'edit'])->name('admin.edit.news');
  Route::post('/admin/news/update/{id}', [NewsController::class, 'update'])->name('admin.update.news');
  Route::post('/admin/news/delete/{id}', [NewsController::class, 'delete'])->name('admin.delete.news');
});

Route::get('/', [WebController::class, 'home'])->name('home');

Route::get('/programs/ted', [WebController::class, 'ted'])->name('ted');
Route::get('/programs/cba', [WebController::class, 'cba'])->name('cba');
Route::get('/programs/cit', [WebController::class, 'cit'])->name('cit');

Route::get('/news', [WebController::class, 'news'])->name('news');
Route::get('/news/article/{id}', [WebController::class, 'article'])->name('news.article');

Route::get('/sdg', [WebController::class, 'sdg'])->name('sdg');
Route::get('/news/{name}', [WebController::class, 'sdgNews'])->name('sdg.news');

require __DIR__ . '/auth.php';
