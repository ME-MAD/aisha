<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SiteController::class, 'index'])->name('home.index');

Route::get('/about', [SiteController::class, 'about'])->name('about.index');
