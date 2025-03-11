<?php

namespace App\Http\Controllers;
use App\Models\Author;

class AuthorController extends Controller {
    public function index() {
        return view('authors', ['authors' => Author::all()]);
    }
    public function show(string $id) {
        return view('writer', ['writer' => Author::all()->where('id', $id)->first()]);
    }
}
