<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');
Route::get('/annunci/crea', [ArticleController::class, 'create'])->name('create.article');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->middleware('isRevisor')->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->middleware('isRevisor')->name('reject');

Route::get('/lavora-con-noi', [RevisorController::class, 'requestForm'])->middleware('auth')->name('revisor.request');
Route::post('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
