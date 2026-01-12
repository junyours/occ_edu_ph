<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\NewsController;
use App\Http\Controllers\Web\ProgramController;
use App\Http\Controllers\Web\SdgController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/programs/ted', [ProgramController::class, 'ted'])->name('ted');
Route::get('/programs/cba', [ProgramController::class, 'cba'])->name('cba');
Route::get('/programs/cit', [ProgramController::class, 'cit'])->name('cit');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/article/{hash_id}', [NewsController::class, 'article']);

Route::get('/sdg', [SdgController::class, 'index'])->name('sdg');
Route::get('/news/{name}', [SdgController::class, 'sdgNews'])->name('sdg.news');

require __DIR__ . '/auth.php';
require __DIR__ . '/app.php';
