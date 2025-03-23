<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'hello world']);
});

Route::get('/author', [\App\Http\Controllers\AuthorController::class, 'index']);

Route::get('/writer/{id}', [\App\Http\Controllers\AuthorController::class, 'show']);

Route::get('/reader/{id}', [\App\Http\Controllers\ReaderController::class, 'show']);

Route::get('/books', [\App\Http\Controllers\BookController::class, 'index']);

Route::get('/books/create', [\App\Http\Controllers\BookController::class, 'create']);

Route::post('/books', [\App\Http\Controllers\BookController::class, 'store']);

Route::get('/books/edit/{id}', [\App\Http\Controllers\BookController::class, 'edit']);

Route::post('/books/update/{id}', [\App\Http\Controllers\BookController::class, 'update'])->name('books.update');

Route::get('/books/destroy/{id}', [\App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');
