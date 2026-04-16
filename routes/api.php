<?php

use App\Http\Controllers\Mobile\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/mobile/news', [NewsController::class, 'news']);
Route::get('/mobile/news/article/{id}', [NewsController::class, 'article']);
