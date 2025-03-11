<?php

namespace App\Http\Controllers;
use App\Models\Book;

class BookController extends Controller {
    public function index() {
        return view ('books', ['books' => Book::all()]);
    }
    public function show(string $id) {
    }
}
