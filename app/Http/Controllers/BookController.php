<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller {
    public function index(Request $request)
    {
            $perpage = $request->perpage ?? 2;
            return view('books', ['books' => Book::paginate($perpage)->withQueryString()]);
    }

    public function create() {
        return view('book_create', ['authors' => Author::all()]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'books_name' => 'required|unique:books|max:255',
            'isbn' => 'required|unique:books|max:255',
            'status' => 'nullable|max:255',
            'author_id' => 'nullable|exists:authors,id',
            'last_name' => 'nullable|max:255',
            'first_name' => 'nullable|max:255',
            'middle_name' => 'nullable|max:255',
            'year_of_birth' => 'nullable|integer', ]);

        if ($request->authors_id) {
            $author = Author::find($request->authors_id);
        }
        else {
            $author = Author::create([
                'last_name' => $validated['last_name'],
                'first_name' => $validated['first_name'],
                'middle_name' => $validated['middle_name'],
                'year_of_birth' => $validated['year_of_birth'],
            ]);
        }

        $book = new Book($validated);
        $book->authors_id = $author->id;
        $book->save();
        return redirect('/books');
    }

    public function edit(string $id)
    {
        if (!Gate::allows('edit-books')) {
            return redirect('/error')->with('message', 'Доступ к редактированию только для администраторов');
        }

        $book = Book::findOrFail($id);
        $author = Author::find($book->authors_id);
        return view('book_edit', ['book' => $book, 'author' => $author]);
    }

    public function update(Request $request, string $id) {
        if (!Gate::allows('edit-books')) {
            return redirect('/error')->with('message', 'Доступ к обновлению только для администраторов');
        }

        $validated = $request->validate([
            'books_name' => 'required|max:255',
            'isbn' => 'required|max:255',
            'status' => 'nullable|max:255',
            'author_id' => 'required|exists:authors,id',
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'year_of_birth' => 'required|integer|'
        ]);
        $book = Book::findOrFail($id);
        $book->update([
            'books_name' => $validated['books_name'],
            'isbn' => $validated['isbn'],
            'status' => $validated['status'],
        ]);
        $author = Author::findOrFail($validated['author_id']);
        $author->update([
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'year_of_birth' => $validated['year_of_birth'],
        ]);
        return redirect('/books');
    }

    public function destroy(string $id)
    {
        if (!Gate::allows('delete-books')) {
            return redirect('/error')->with('message', 'Доступ к удалению только для администраторов');
        }

        DB::table('deliveries')->where('book_id', $id)->delete();
        Book::findOrFail($id)->delete();
        return redirect('/books');
    }
}
