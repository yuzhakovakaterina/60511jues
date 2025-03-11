<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'hello world']);
});

Route::get('/author', [\App\Http\Controllers\AuthorController::class, 'index']);

Route::get('/writer/{id}', [\App\Http\Controllers\AuthorController::class, 'show']);

Route::get('/books', [\App\Http\Controllers\BookController::class, 'index']);

Route::get('/reader/{id}', [\App\Http\Controllers\ReaderController::class, 'show']);
