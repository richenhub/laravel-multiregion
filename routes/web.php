<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/news', [MainController::class, 'news'])->name('news');
Route::get('/{city}/about', [MainController::class, 'setCityAbout'])->name('about.city');
Route::get('/{city}/news', [MainController::class, 'setCityNews'])->name('news.city');
Route::get('/{city}', [MainController::class, 'setCity'])->name('set.city');
